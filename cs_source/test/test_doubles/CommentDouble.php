<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\CommentInterface;

class CommentDouble implements CommentInterface
{
    private static $comments = [
        [
            'id' => 1,
            'itemId' => 1,
            'username' => 'Antes',
            'body' => 'This is a comment.'
        ],
        [
            'id' => 2,
            'itemId' => 1,
            'username' => 'TehCraw',
            'body' => 'This is another comment, as if that wasn\'t obvious.'
        ]
    ];
    
    public function getCommentsForItem($id)
    {
        if ($id !== 1) {
            return [];
        }
        
        return self::$comments;
    }
    
    public function saveComment($itemId, $username, $body)
    {
        $newId = end(self::$comments)['id'] + 1;
        self::$comments[] = [
            'id' => $newId,
            'item_id' => $itemId,
            'username' => $username,
            'body' => $body
        ];
    }
}
