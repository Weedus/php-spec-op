<?php

namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\Exceptions\NotYetImplementedException;
use Weedus\PhpSpecOps\Model\Area\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\ArmorInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\ArmorType;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Support\SupportItemInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Support\SupportItemType;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\WeaponInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\WeaponType;
use Weedus\PhpSpecOps\Operator\Effects\EffectInterface;
use Weedus\PhpSpecOps\Tests\Helper\TestArmor;
use Weedus\PhpSpecOps\Tests\Helper\TestEffect;
use Weedus\PhpSpecOps\Tests\Helper\TestItem;
use Weedus\PhpSpecOps\Tests\Helper\TestSupportItem;
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

        $this->assertEquals('armor', $armor->getName());
    }

    public function testWeapon()
    {
        $megaWeapon = new TestWeapon('mega_weapon', 10, 10, Range::ZERO(), Range::HIGH(),WeaponType::PISTOL());
        $crapWeapon = new TestWeapon('crap_weapon', 1000, 0, Range::ZERO(), Range::ZERO(),WeaponType::DAGGER());

        $this->assertInstanceOf(WeaponInterface::class, $megaWeapon );
        $this->assertInstanceOf(WeaponInterface::class, $crapWeapon );
        $this->assertTrue($megaWeapon->equalsType($crapWeapon));
        $this->assertFalse($megaWeapon->equals($crapWeapon));
        $this->assertFalse($megaWeapon->equalsWeaponType($crapWeapon));

        $this->assertEquals('mega_weapon', $megaWeapon->getName());
        $this->assertEquals(10, $megaWeapon->getPower());
        $this->assertEquals(10, $megaWeapon->getDefense());
        $this->assertTrue($megaWeapon->getMinRange()->equals(Range::ZERO()));
        $this->assertTrue($megaWeapon->getMaxRange()->equals(Range::HIGH()));
    }

    public function testArmor()
    {
        $this->assertEquals('head', ArmorType::HEAD()->getValue());
        $this->assertEquals('chest', ArmorType::CHEST()->getValue());
        $this->assertEquals('legs', ArmorType::LEGS()->getValue());

        $head = new TestArmor('head',5,ArmorType::HEAD());
        $head2 = new TestArmor('head2',7,ArmorType::HEAD());
        $head3 = new TestArmor('head2',7,ArmorType::HEAD());
        $chest = new TestArmor('chest',5,ArmorType::CHEST());
        $legs = new TestArmor('legs',5,ArmorType::LEGS());

        $this->assertInstanceOf(ArmorInterface::class, $head);

        $this->assertFalse($head->equalsArmorType($chest));
        $this->assertFalse($head->equalsArmorType($legs));
        $this->assertFalse($chest->equalsArmorType($legs));
        $this->assertFalse($head->equals($chest));
        $this->assertFalse($head->equals($legs));
        $this->assertFalse($chest->equals($legs));

        $this->assertTrue($head->equalsArmorType($head2));
        $this->assertTrue($head->equalsArmorType($head3));
        $this->assertTrue($head2->equalsArmorType($head3));
        $this->assertFalse($head->equals($head2));
        $this->assertFalse($head->equals($head3));
        $this->assertTrue($head2->equals($head3));

        $this->assertEquals(5, $head->getDefense());
    }

    public function testSupport()
    {
        $item = new TestSupportItem(
            'test_item',
            'just for testing',
            TestEffect::create(),
            Range::MEDIUM(),
            0,
            0,
            SupportItemType::FLASK()
        );
        $item2 = new TestSupportItem(
            'test_item2',
            'just for testing',
            TestEffect::create(),
            Range::MEDIUM(),
            0,
            0,
            SupportItemType::FLASK()
        );

        $this->assertInstanceOf(SupportItemInterface::class, $item);
        $this->assertEquals('just for testing', $item->getText());
        $this->assertInstanceOf(EffectInterface::class, $item->getEffect());
        $this->assertTrue(Range::MEDIUM()->equals($item->getRange()));
        $this->assertEquals(0, $item->getPreparationTime());
        $this->assertEquals(0, $item->getDuration());
        $this->assertTrue($item->equals($item));
        $this->assertTrue($item->equalsType($item));
        $this->assertTrue($item->equalsSupportItemType($item));
        $this->assertFalse($item->equals($item2));
    }
}