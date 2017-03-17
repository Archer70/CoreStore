<?php

function template_main()
{
    $fakeItems = [
        [
            'id' => 1,
            'title' => '1lb Bacon',
            'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
            'price' => 4.74,
            'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
        ],
        [
            'id' => 1,
            'title' => '1lb Bacon',
            'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
            'price' => 4.74,
            'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
        ],
        [
            'id' => 1,
            'title' => '1lb Bacon',
            'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
            'price' => 4.74,
            'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
        ]
    ];
    
    foreach ($fakeItems as $item) {
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
