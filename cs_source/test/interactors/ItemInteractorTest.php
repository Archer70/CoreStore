<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\ItemInteractor;
use CoreStore\data_managers\ItemSMF;

class ItemInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;
    
    public function setUp()
    {
        $this->interactor = new ItemInteractor(new ItemSMF());
    }
    
    public function testLoadsContextWithDbInfo()     
    {
        global $context;
        $this->interactor->loadItemContext();
        $this->assertArrayHasKey('cs_item', $context);
    }
}
