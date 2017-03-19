<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\ItemData;

class ItemDouble implements ItemData
{
	public function getItemInformation($itemId)
	{
		return $itemId === 1 ? [
			'title' => 'Bacon',
			'price' => 4.47,
			'description' => 'Bacon ipsum dolor amet ribeye meatloaf pork belly porchetta. Capicola frankfurter shoulder pancetta andouille picanha spare ribs chicken salami kevin short ribs. Cow tongue ribeye ham pork belly porchetta pastrami venison. Turducken jerky tail, prosciutto burgdoggen meatball hamburger kevin sirloin ribeye meatloaf cow doner. Pork belly tail turducken bacon, shankle sirloin pastrami fatback ribeye boudin shank picanha alcatra salami. Sausage drumstick sirloin pork belly.
Turkey short loin boudin ball tip cow frankfurter drumstick alcatra pig. Tenderloin pork tongue spare ribs meatball, jowl meatloaf beef ribs shoulder ball tip turducken t-bone boudin. Pastrami flank t-bone, bacon alcatra frankfurter bresaola jerky beef ribs. Chuck shankle shank, picanha rump swine ground round. Leberkas doner bresaola sausage boudin pig short ribs, andouille cow ribeye prosciutto tenderloin turkey ham hock. :)'
		] : [];
	}
}
