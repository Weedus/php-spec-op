<?php

namespace Weedus\PhpSpecOps\Core\Tests\unit;

use Weedus\Collection\SpecificationCollection;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestArmorLegs;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestInventory;

class InventoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $inventory = new TestInventory(new SpecificationCollection());
        $storage = $inventory->getStorage();
        $this->assertFalse($storage->hasItem());

        $item1 = new TestArmorLegs('one',1);
        $item2 = new TestArmorLegs('two',1);
        $fail = new \stdClass();

        try{
            $inventory->addItem($fail);
        }catch(\Error $error){
            $asd='asd';
        }catch(\Exception $exception){
            $asd='asd';

        }

    }
}