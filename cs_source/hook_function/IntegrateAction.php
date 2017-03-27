<?php

function csIntegrateAction(&$actionArray)
{
	$actionArray['store'] = ['cs_source/endpoint/FrontPage.php', 'csFrontPage'];
	$actionArray['store_item'] = ['cs_source/endpoint/Item.php', 'csItem'];
	$actionArray['store_preview'] = ['cs_source/endpoint/Preview.php' , 'csPreview'];
}
