<?php

function template_main()
{
    global $context;
    echo '
        <h2 id="item_title">Item Title</h2>
        <img id="item_thumbnail" src="https://avatars0.githubusercontent.com/u/2660927?v=3&s=460" alt="">
        <div id="item_description">
            <div id="item_photo_slider">Image slider</div>
            <p>Description text, paragraph one.</p>
            <p>Description text, paragraph two.</p>
        </div>';    
}
