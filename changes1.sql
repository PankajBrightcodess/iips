-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'inventory', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fab fa-list\" aria-hidden=\"true\"></i>', 'Inventory', '0', '1', '1');

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'addpurchase', '{\"0\":\"\"}', 'inventory/add_purchase', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Add Purchase', '21', '1', '1');

--  RENAME TABLE `db_sethisbakery`.`uoms` TO `db_sethisbakery`.`sb_uoms`; 
 
--  INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'masterkey/supplier', '{\"0\":\"\"}', 'admin/masterkey/supplier', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Supplier', '2', '1', '1'); 
 

-- CREATE TABLE IF NOT EXISTS `sb_inventory_supplier` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(100) NOT NULL, `shop_name` varchar(100) NOT NULL, `mobile` varchar(15) NOT NULL, `email` varchar(50) NOT NULL, `gst` varchar(50) NOT NULL, `address` varchar(255) NOT NULL, `role` int(11) NOT NULL, `status` tinyint(4) NOT NULL DEFAULT '1', PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3

-- CREATE TABLE IF NOT EXISTS `sb_inventory_purchasetemp` ( `id` int(11) NOT NULL AUTO_INCREMENT, `product_id` int(11) NOT NULL, `unit` varchar(20) NOT NULL, `rate` float(14,2) NOT NULL, `quantity` float(14,2) NOT NULL, `taxable` float(14,2) NOT NULL, `gst` float(14,2) NOT NULL, `gstvalue` float(14,2) NOT NULL, `amount` float(14,2) NOT NULL, `role` int(11) NOT NULL, `status` tinyint(4) NOT NULL DEFAULT '1', PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1

-- CREATE TABLE IF NOT EXISTS `sb_inventory_purchase` ( `id` int(11) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `invoice` varchar(50) NOT NULL, `time` time NOT NULL, `supplier_id` int(11) NOT NULL, `mobile` varchar(15) NOT NULL, `payment_mode` varchar(20) NOT NULL, `gross_amt` float(14,2) NOT NULL, `round` float(14,2) NOT NULL, `total` float(14,2) NOT NULL, `role` int(11) NOT NULL, `status` tinyint(4) NOT NULL DEFAULT '1', PRIMARY KEY (`id`) )


-- CREATE TABLE IF NOT EXISTS `ng_inventory_purchaseproducts` ( `id` int(11) NOT NULL AUTO_INCREMENT, `product_id` int(11) NOT NULL, `pcode` varchar(100) NOT NULL, `unit` varchar(50) NOT NULL, `rate` float(14,2) NOT NULL, `gst` float(14,2) NOT NULL, `quantity` float(14,2) NOT NULL, `taxable` float(14,2) NOT NULL, `gstvalue` float(14,2) NOT NULL, `amount` float(14,2) NOT NULL, `purchase_id` int(11) NOT NULL, `role` int(11) NOT NULL, `status` tinyint(4) NOT NULL DEFAULT '1', PRIMARY KEY (`id`) ) 

-- RENAME TABLE `db_sethisbakery`.`ng_inventory_purchaseproducts` TO `db_sethisbakery`.`sb_inventory_purchaseproducts`;

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'Stock', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fab fa-list\" aria-hidden=\"true\"></i>', 'Stock', '0', '1', '1');

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'add_stock', '{\"0\":\"\"}', 'admin/stock/add_stock', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Add Stock', '24', '1', '1');

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'stocklist', '{\"0\":\"\"}', 'admin/stock/stoclist', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Stocklist', '24', '1', '1');


-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'purchaselist', '{\"0\":\"\"}', 'admin/inventory/purchaselist', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Purchase List', '21', '1', '1');

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'payment', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fab fa-rupee\" aria-hidden=\"true\"></i>', 'Payment', '0', '1', '1'); 

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'payment/pay_form', '{\"0\":\"\"}', 'admin/payment/pay_form', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Pay', '21', '1', '1'); 

-- UPDATE `sb_sidebar` SET `parent` = '28' WHERE `sb_sidebar`.`id` = 29; 

-- ALTER TABLE `sb_inventory_purchase` CHANGE `payment_mode` `waybill` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL; 

-- RENAME TABLE `db_sethisbakery`.`payment` TO `db_sethisbakery`.`sb_inventory_payment`;

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'Delivery Valet', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-motorcyclee\" aria-hidden=\"true\"></i>', 'Delivery Valet', '0', '1', '1');

-- UPDATE `sb_sidebar` SET `icon` = '<i class=\"fa fa-motorcycle\" aria-hidden=\"true\"></i>' WHERE `sb_sidebar`.`id` = 30;
-- UPDATE `sb_sidebar` SET `icon` = '<i class=\"fa fa-rupee\" aria-hidden=\"true\"></i>' WHERE `sb_sidebar`.`id` = 28;

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'Add valet', '{\"0\":\"\"}', 'admin/valet/add_valet', '', 'Add Valet', '30', '1', '1');

-- UPDATE `sb_sidebar` SET `activate_menu` = 'Add Staff', `icon` = '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>', `name` = 'ADD STAFF' WHERE `sb_sidebar`.`id` = 30;

-- INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'masterkey/designation', '{\"0\":\"\"}', 'admin/masterkey/designation', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Designation', '2', '1', '1');
INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'masterkey/designation', '{\"0\":\"\"}', 'admin/masterkey/designation', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Designation', '2', '1', '1');


UPDATE `sb_sidebar` SET `base_url` = 'admin/staff/add_valet' WHERE `sb_sidebar`.`id` = 31; 


ALTER TABLE `sb_staff` CHANGE `picture` `picture` TEXT NOT NULL;


INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'delivery_valet', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-motorcycle\" aria-hidden=\"true\"></i>', 'Add Delivery valet', '0', '1', '1');

INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'Add new', '{\"0\":\"\"}', 'admin/valet/add_new', '', 'Add valet', '34', '1', '1');

INSERT INTO `sb_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `role_id`, `status`) VALUES (NULL, 'valet_list', '{\"0\":\"\"}', 'admin/valet/valet_list', '', 'Valet List', '34', '1', '1');
