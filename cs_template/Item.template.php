<?php

function template_main()
{
    global $context, $txt;
	
	// I can't think of a good reason making text bbc presentable shouldn't be a template operation.
	$context['cs_item']['description'] = parse_bbc($context['cs_item']['description']);
	$comments = $context['cs_item_comments'];
	foreach ($comments as $id => $comment) {
		$comments[$id]['body'] = parse_bbc($comment['body']);
	}

    echo '
        <h2 id="item_title" class="subbg">', $context['cs_item']['title'], '</h2>
        <img id="item_thumbnail" src="http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg" alt="">
        <div id="item_description">
            <div id="item_photo_slider">', $txt['cs_slider'],'</div>
            ', $context['cs_item']['description'], '
        </div>
		<div id="buttons">
			<a href="#" id="buy_now" class="button">', $txt['cs_buy_now'],' ($', $context['cs_item']['price'], ')</a>
		</div>
		<div id="feedback">
			<div class="cat_bar">
				<h3 class="catbg">', $txt['cs_comments'],'</h3>
			</div>';

		foreach ($comments as $comment) {
			echo '
			<div id="comment_', $comment['id'], '" class="windowbg">
				<div class="user_comment">', $comment['body'], '</div>
				<div class="user_information">', $comment['username'], '</div>
			</div>';
		}
		
		echo '
			<div id="cs_reply">
				<div class="cat_bar">
					<h3 class="catbg">', $txt['cs_comment_box'],'</h3>
				</div>
				<div class="roundframe noup">
					<span id="cs_editor_switch" class="enabled" data-tab="cs_editor">', $txt['cs_editor'],'</span>
					<span id="cs_preview_switch" data-tab="cs_preview">', $txt['cs_preview'],'</span>
					<div id="cs_editor" class="cs_content enabled">
						<div id="cs_bbc_box"></div>
						<div id="cs_smiley_box"></div>
						', template_control_richedit($context['post_box_name'], 'cs_smiley_box', 'cs_bbc_box'), '
					</div>
					<div id="cs_preview" class="cs_content">
						<div class="windowbg">', $txt['cs_no_preview'],'</div>
					</div>
				</div>
			</div>
		</div>';

		/* Snip taken from https://codepen.io/cssjockey/pen/jGzuK - thanks to cssjockey */
		echo '
		<script>
		$(document).ready(function(){
			$("#cs_reply span").click(function(){
				var tab_id = $(this).attr("data-tab");

				$("#cs_reply span").removeClass("enabled");
				$(".cs_content").removeClass("enabled");

				$(this).addClass("enabled");
				$("#"+tab_id).addClass("enabled");
			})
		})
		</script>';
}
