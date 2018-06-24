<?php

namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;
use Weedus\PhpSpecOps\Tests\Helper\TestItem;

class ItemTest extends \Codeception\Test\Unit
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

    public function testItem()
    {
        $armor = new TestItem('armor', ItemType::ARMOR());
        $armor2 = new TestItem('armor2', ItemType::ARMOR());
        $weapon = new TestItem('weapon', ItemType::WEAPON());
        $weapon2 = new TestItem('weapon2', ItemType::WEAPON());
        $support = new TestItem('support', ItemType::SUPPORT());
        $support2 = new TestItem('support2', ItemType::SUPPORT());

        $this->assertInstanceOf(ItemInterface::class, $armor);
        $this->assertInstanceOf(ItemInterface::class, $armor2);
        $this->assertInstanceOf(ItemInterface::class, $weapon);
        $this->assertInstanceOf(ItemInterface::class, $weapon2);
        $this->assertInstanceOf(ItemInterface::class, $support);
        $this->assertInstanceOf(ItemInterface::class, $support2);


        $this->assertTrue($armor->equalsType($armor));
        $this->assertTrue($armor->equalsType($armor2));
        $this->assertTrue($armor->equals($armor));
        $this->assertFalse($armor->equals($armor2));
        $this->assertFalse($armor->equalsType($weapon));
        $this->assertFalse($armor->equalsType($weapon2));
        $this->assertFalse($armor->equals($support));
        $this->assertFalse($armor->equals($support2));

        $this->assertTrue($weapon->equalsType($weapon));
        $this->assertTrue($weapon->equalsType($weapon2));
        $this->assertTrue($weapon->equals($weapon));
        $this->assertFalse($weapon->equals($weapon2));

        $this->assertTrue($support->equalsType($support));
        $this->assertTrue($support->equalsType($support2));
        $this->assertTrue($support->equals($support));
        $this->assertFalse($support->equals($support2));
    }

}