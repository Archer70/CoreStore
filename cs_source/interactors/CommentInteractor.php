<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\CommentInterface;

class CommentInteractor
{
    private $data;
    
    public function __construct(CommentInterface $data)
    {
        $this->data = $data;
    }
    
    public function loadCommentsForItem($itemId)
    {
        global $context;
        $comments = $this->data->getCommentsForItem((int) $itemId);
        if (empty($comments)) {
            throw new \Exception('No comments for item.');
        }
        $context['cs_item_comments'] = $comments;
    }
    
    public function saveComment($itemId, $username, $comment)
    {
        $this->data->saveComment($itemId, $username, $comment);
    }
}
