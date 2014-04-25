#
# Migrating shop <shop_id>
#

INSERT INTO `oxdiscount2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxdiscount_<shop_id>`;
INSERT INTO `oxcategories2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxcategories_<shop_id>`;
INSERT INTO `oxattribute2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxattribute_<shop_id>`;
INSERT INTO `oxlinks2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxlinks_<shop_id>`;
INSERT INTO `oxvoucherseries2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxvoucherseries_<shop_id>`;
INSERT INTO `oxmanufacturers2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxmanufacturers_<shop_id>`;
INSERT INTO `oxnews2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxnews_<shop_id>`;
INSERT INTO `oxselectlist2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxselectlist_<shop_id>`;
INSERT INTO `oxwrapping2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxwrapping_<shop_id>`;
INSERT INTO `oxdeliveryset2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxdeliveryset_<shop_id>`;
INSERT INTO `oxdelivery2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxdelivery_<shop_id>`;
INSERT INTO `oxvendor2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxvendor_<shop_id>`;
INSERT INTO `oxobject2category2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxobject2category_<shop_id>`;
INSERT INTO `oxarticles2shop` (`OXSHOPID`, `OXMAPOBJECTID`) SELECT '<shop_id>', OXMAPID FROM `oxv_oxarticles_<shop_id>`;
