<?php

function template_main()
{
    global $context, $scripturl, $txt;

	// First of all lets split this place into two so we can add sidebar (or something else later more easily)
	echo '
		<div id="cs_front_page">
			<div id="cs_sidebar" class="floatleft">
				<div class="title_bar">
					<h3 class="titlebg">', $txt['cs_user_info'],'</h3>
				</div>
				<div class="information centertext">
					<a href="', $scripturl, '?action=profile;u=', $context['user']['id'], '">', $context['user']['name'], '</a>
					<a href="', $scripturl, '?action=profile;u=', $context['user']['id'], '" class="block">', $context['user']['avatar']['image'], '</a>
				</div>
				<div class="title_bar">
					<h3 class="titlebg">', $txt['cs_categories'],'</h3>
				</div>
				<div class="information">
					', $txt['cs_no_category'],'
				</div>
			</div>';
	// This is where magic happens
	echo '
			<div id="cs_item_container">
				<div id="cs_featured">
					<div class="cat_bar">
						<h3 class="catbg">', $txt['cs_featured'],'</h3>
					</div>
					<div class="windowbg2 noup">
						', $txt['cs_no_featured'],'
					</div>';

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

	echo '
			</div>
		</div>';
}
