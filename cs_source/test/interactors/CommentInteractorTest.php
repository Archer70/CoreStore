<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\CommentInteractor;
use CoreStore\test\test_doubles\CommentDouble;

class CommentInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;
    
    public function setUp()
    {
        $this->interactor = new CommentInteractor(new CommentDouble());
    }
    
    public function testGetCommentsForItem()     
    {
        global $context;
        $this->interactor->loadCommentsForItem(1);
        $this->assertArrayHasKey('cs_item_comments', $context);
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage No comments for item.
     */
    public function testThrowsExceptionIfNoComments()     
    {
        $this->interactor->loadCommentsForItem(2);
    }
    
    public function testSavesComment()     
    {
        global $context;
        $this->interactor->saveComment(1, 'TehCraw', 'New post.');
        $this->interactor->loadCommentsForItem(1);
        $lastComment = end($context['cs_item_comments']);
        $this->assertEquals('New post.', $lastComment['body']);
    }
}
