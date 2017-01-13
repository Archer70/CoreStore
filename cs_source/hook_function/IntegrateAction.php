<?php

function csIntegrateAction(&$actionArray)
{
    $actionArray['store_item'] = array('cs_source/endpoint/Item.php', 'csItem');
}
