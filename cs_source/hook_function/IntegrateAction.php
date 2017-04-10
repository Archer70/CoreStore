<?php

function csIntegrateAction(&$actionArray)
{
	$actionArray['store_admin'] = ['cs_source/endpoint/StoreAdmin.php', 'csStoreAdmin'];
	$actionArray['store'] = ['cs_source/endpoint/FrontPage.php', 'csFrontPage'];
	$actionArray['store_item'] = ['cs_source/endpoint/Item.php', 'csItem'];
	$actionArray['store_category'] = ['cs_source/endpoint/Category.php', 'csCategory'];
	$actionArray['store_preview'] = ['cs_source/endpoint/Preview.php' , 'csPreview'];
}
