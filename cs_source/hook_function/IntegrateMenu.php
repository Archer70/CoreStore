<?php

function csIntegrateMenu(&$menu)
{
    global $scripturl;
    $menu['cs_store'] = [
        'title' => 'Store',
        'href' => $scripturl . '?action=store',
        'show' => true,
        'icon' => 'cs_store.png'
    ];
}
