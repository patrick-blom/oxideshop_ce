<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Integration\Internal\Module\Configuration\Dao;

use OxidEsales\EshopCommunity\Internal\Application\ContainerBuilder;
use OxidEsales\EshopCommunity\Internal\Module\Configuration\Dao\ShopConfigurationDaoInterface;
use OxidEsales\EshopCommunity\Internal\Utility\FactsContext;
use PHPUnit\Framework\TestCase;

class ShopConfigurationDaoTest extends TestCase
{
    public function testGetReturnsShopConfigurationForProperEnvironment()
    {
        $moduleConfigurationsDev = $this->getModuleConfigurationsByEnvironment('dev');
        $this->assertArrayHasKey('testModule1', $moduleConfigurationsDev);

        $moduleConfigurationsProd = $this->getModuleConfigurationsByEnvironment('prod');
        $this->assertArrayNotHasKey('testModule1', $moduleConfigurationsProd);
    }

    public function testSavePersistsShopConfigurationForProperEnvironment()
    {
        $moduleConfigurationsProd = $this->getModuleConfigurationsByEnvironment('prod');
        $this->assertArrayNotHasKey('testModule1', $moduleConfigurationsProd);

        $this->saveDevConfigurationToProdConfiguration();

        $moduleConfigurationsProd = $this->getModuleConfigurationsByEnvironment('prod');
        $this->assertArrayHasKey('testModule1', $moduleConfigurationsProd);
    }

    /**
     * @param string $environment
     *
     * @return mixed
     */
    private function getModuleConfigurationsByEnvironment(string $environment): array
    {
        $moduleConfigurationsProd = $this->getShopConfigurationDao()
            ->get($environment, 1)
            ->getModuleConfigurations();

        return $moduleConfigurationsProd;
    }

    private function saveDevConfigurationToProdConfiguration()
    {
        $shopConfigurationDev = $this
            ->getShopConfigurationDao()
            ->get('dev', 1);

        $this
            ->getShopConfigurationDao()
            ->save(
                'prod',
                1,
                $shopConfigurationDev
            );
    }

    /**
     * @return object|\OxidEsales\EshopCommunity\Internal\Module\Configuration\Dao\ShopConfigurationDao
     * @throws \Exception
     */
    private function getShopConfigurationDao()
    {
        return $this->getContainer()->get(ShopConfigurationDaoInterface::class);
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private function getContainer(): \Symfony\Component\DependencyInjection\ContainerBuilder
    {
        $containerBuilder = new ContainerBuilder(new FactsContext());
        $container = $containerBuilder->getContainer();

        $configFilePath = $this->getPathToTemporaryFile();
        $this->populateConfigFile($configFilePath);

        $projectConfigurationYmlStorageDefinition = $container->getDefinition('oxid_esales.module.configuration.project_configuration_yaml_file_storage');
        $projectConfigurationYmlStorageDefinition->setArgument(
            '$filePath',
            $configFilePath
        );

        $container->setDefinition(
            'oxid_esales.module.configuration.project_configuration_yaml_file_storage',
            $projectConfigurationYmlStorageDefinition
        );
        $container->compile();

        return $container;
    }

    private function getPathToTemporaryFile(): string
    {
        return stream_get_meta_data(tmpfile())['uri'];
    }

    /**
     * @param string $configFilePath
     */
    private function populateConfigFile(string $configFilePath)
    {
        $projectConfigurationYaml = '
environments:
  dev:
    shops:
      1:
        modules:
          testModule1:
            id: testModule1
            autoActive: false
            title: ""
            description: {  }
            lang: ""
            thumbnail: ""
            author: ""
            url: ""
            email: ""
            settings: {  }
  prod:
    shops: 
      1: {}
        ';
        file_put_contents($configFilePath, $projectConfigurationYaml);
    }
}
