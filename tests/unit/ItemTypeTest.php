<?php

namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;

class ItemTypeTest extends \Codeception\Test\Unit
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
    public function testCreation()
    {
        $failed = false;
        try{
            ItemType::create('test');
        }catch(\Exception $exception){
            $failed = true;
            $this->assertContains("Couldn't find constant" ,$exception->getMessage());
        }
        $this->assertTrue($failed);

        $this->assertInstanceOf(ItemType::class,ItemType::SUPPORT());
        $this->assertInstanceOf(ItemType::class,ItemType::WEAPON());
        $this->assertInstanceOf(ItemType::class,ItemType::ARMOR());
    }

    public function testCheckType()
    {
        $this->assertEquals('support',ItemType::SUPPORT()->getValue());
        $this->assertEquals('weapon',ItemType::WEAPON()->getValue());
        $this->assertEquals('armor',ItemType::ARMOR()->getValue());
    }
}