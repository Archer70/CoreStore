<?php

function csIntegrateAction(&$actionArray)
{
    $actionArray['store'] = array('cs_source/endpoint/FrontPage.php', 'csFrontPage');
    $actionArray['store_item'] = array('cs_source/endpoint/Item.php', 'csItem');
}
