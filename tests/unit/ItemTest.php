<?php

namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\Exceptions\NotYetImplementedException;
use Weedus\PhpSpecOps\Model\Area\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\WeaponInterface;
use Weedus\PhpSpecOps\Tests\Helper\TestItem;
use Weedus\PhpSpecOps\Tests\Helper\TestWeapon;

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

    public function testWeapon()
    {
        $megaWeapon = new TestWeapon('mega_weapon', 10, 10, Range::ZERO(), Range::HIGH());
        $crapWeapon = new TestWeapon('crap_weapon', 1000, 0, Range::ZERO(), Range::ZERO());

        $this->assertInstanceOf(WeaponInterface::class, $megaWeapon );
        $this->assertInstanceOf(WeaponInterface::class, $crapWeapon );
        $this->assertTrue($megaWeapon->equalsType($crapWeapon));
        $this->assertFalse($megaWeapon->equals($crapWeapon));

        $this->assertEquals('mega_weapon', $megaWeapon->getName());
        $this->assertEquals(10, $megaWeapon->getPower());
        $this->assertEquals(10, $megaWeapon->getDefense());
        $this->assertTrue($megaWeapon->getMinRange()->equals(Range::ZERO()));
        $this->assertTrue($megaWeapon->getMaxRange()->equals(Range::HIGH()));

    }

    public function testArmor()
    {
        throw new NotYetImplementedException(__METHOD__);
    }

    public function testSupport()
    {
        throw new NotYetImplementedException(__METHOD__);
    }
}