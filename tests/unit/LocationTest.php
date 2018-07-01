<?php

namespace Weedus\PhpSpecOps\Core\Tests\unit;

use Weedus\PhpSpecOps\Core\Model\Area\Location;

class LocationTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /** @var Location */
    private $location;

    protected function _before()
    {
        $this->location = new Location(1, 1, 0);
    }

    protected function _after()
    {
    }

    // tests
    public function testCreation()
    {
        $this->assertInstanceOf(Location::class, Location::create(1, 1, 1));
    }

    /**
     * @depends testCreation
     */
    public function testValues()
    {
        $this->assertEquals(1, $this->location->getX());
        $this->assertEquals(1, $this->location->getY());
        $this->assertEquals(0, $this->location->getZ());
        $location = clone $this->location;
        $location->setX(2)->setY(2)->setZ(2);
        $this->assertEquals(2, $location->getX());
        $this->assertEquals(2, $location->getY());
        $this->assertEquals(2, $location->getZ());
    }

    /**
     * @depends testCreation
     * @throws \Assert\AssertionFailedException
     */
    public function testEquals()
    {
        $fail1 = new Location(0, 1, 0);
        $fail2 = new Location(1, 1, 1);
        $fail3 = new Location(1, 0, 1);
        $success = new Location(1, 1, 0);

        $this->assertFalse($this->location->equals($fail1));
        $this->assertFalse($this->location->equals($fail2));
        $this->assertFalse($this->location->equals($fail3));
        $this->assertTrue($this->location->equals($success));
    }
}