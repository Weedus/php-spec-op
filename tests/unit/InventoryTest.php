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
    /** @var TestInventory */
    protected $inventory;
    /** @var SpecificationCollection */
    protected $storage;
    /** @var TestArmorLegs */
    protected $item1;
    /** @var TestArmorLegs */
    protected $item2;

    protected function _before()
    {
        $this->storage = new SpecificationCollection();
        $this->inventory = new TestInventory($this->storage);

        $this->item1 = new TestArmorLegs('one', 1);
        $this->item2 = new TestArmorLegs('two', 1);
    }

    protected function _after()
    {
    }

    // tests

    /**
     * @throws \Weedus\Exceptions\NotAllowedException
     */
    public function testAddingItems()
    {
        $this->assertFalse($this->storage->hasItem());

        $this->assertEquals([], $this->inventory->getList());

        $this->inventory->addItem($this->item1)
            ->addItem($this->item2)
            ->addItem($this->item2);

        $this->assertEquals(1, $this->inventory->getAmount($this->item1->getName()));
        $this->assertEquals(2, $this->inventory->getAmount($this->item2->getName()));
        $this->assertEquals([['name' => 'one', 'amount' => 1], ['name' => 'two', 'amount' => 2]], $this->inventory->getList());
        $item1 = $this->inventory->getItem($this->item1->getName());
        $item2 = $this->inventory->getItem($this->item2->getName());
        $this->assertTrue($item1->equals($this->item1));
        $this->assertTrue($item2->equals($this->item2));
        $this->assertEquals(0, $this->inventory->getAmount($this->item1->getName()));
        $this->assertEquals(1, $this->inventory->getAmount($this->item2->getName()));
        $this->assertEquals([['name' => 'two', 'amount' => 1]], $this->inventory->getList());
    }
}
