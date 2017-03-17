<?php

function template_main()
{
    global $context;
    
    foreach ($context['cs_items'] as $item) {
        global $scripturl;
        printf('
            <div class="cs_item">
                <h3><a href="' . $scripturl . '?action=store_item;item=%d">%s</a></h3>
                <img src="%s" alt="bacon">
                <span class="price">$%g</span>
                <span class="description">%s</span>
            </div>',
        $item['id'], $item['title'], $item['image'], $item['price'], $item['description']);
    }
}
