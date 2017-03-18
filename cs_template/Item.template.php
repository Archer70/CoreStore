<?php

function template_main()
{
    global $context, $txt;
    echo '
        <h2 id="item_title" class="subbg">Item Title</h2>
        <img id="item_thumbnail" src="http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg" alt="">
        <div id="item_description">
            <div id="item_photo_slider">Image slider</div>
            <p style="text-align: justify;">Bacon ipsum dolor amet ribeye meatloaf pork belly porchetta. Capicola frankfurter shoulder pancetta andouille picanha spare ribs chicken salami kevin short ribs. Cow tongue ribeye ham pork belly porchetta pastrami venison. Turducken jerky tail, prosciutto burgdoggen meatball hamburger kevin sirloin ribeye meatloaf cow doner. Pork belly tail turducken bacon, shankle sirloin pastrami fatback ribeye boudin shank picanha alcatra salami. Sausage drumstick sirloin pork belly.</p>
            <p style="text-align: justify;">Turkey short loin boudin ball tip cow frankfurter drumstick alcatra pig. Tenderloin pork tongue spare ribs meatball, jowl meatloaf beef ribs shoulder ball tip turducken t-bone boudin. Pastrami flank t-bone, bacon alcatra frankfurter bresaola jerky beef ribs. Chuck shankle shank, picanha rump swine ground round. Leberkas doner bresaola sausage boudin pig short ribs, andouille cow ribeye prosciutto tenderloin turkey ham hock.</p>
        </div>
		<div id="buttons">
			<a href="#" id="buy_now" class="button">Buy Now ($4.74)</a>
		</div>
		<div id="feedback">
			<div class="cat_bar">
				<h3 class="catbg">Comments on Product</h3>
			</div>
			<div id="comment_1" class="windowbg">
				<div class="user_comment">A comment</div>
				<div class="user_information">Antes</div>
			</div>
			<div id="comment_2" class="windowbg">
				<div class="user_comment">Another comment</div>
				<div class="user_information">Antes</div>
			</div>
		</div>';
}
