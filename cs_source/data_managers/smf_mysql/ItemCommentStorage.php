<?php
namespace CoreStore\data_managers\smf_mysql;
use CoreStore\interfaces\CommentInterface;

class ItemCommentStorage implements CommentInterface
{
	public function getCommentsForItem($item)
	{
		global $smcFunc;
		
		$comments = [];
		$query = $smcFunc['db_query']('', '
			SELECT id, item_id, username, body
			FROM {db_prefix}cs_item_comments
			WHERE item_id = {int:item}',
			[
				'item' => $item
			]
		);
		while($row = $smcFunc['db_fetch_assoc']($query)) {
			$comments[] = $row;
		}
		return $comments;
	}
	
	// Save comment, eventually.
}
