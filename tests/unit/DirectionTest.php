<?php namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\PhpSpecOps\Model\ValueObjects\Direction;

class DirectionTest extends \Codeception\Test\Unit
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
    public function testCreate()
    {
        $failed = false;
        try{
            Direction::create('blub');
        }catch (\Exception $exception){
            $failed = true;
        }
        $this->assertTrue($failed);

        $this->assertEquals('north', Direction::NORTH()->getValue());
        $this->assertEquals('north_east', Direction::NORTH_EAST()->getValue());
        $this->assertEquals('east', Direction::EAST()->getValue());
        $this->assertEquals('south_east', Direction::SOUTH_EAST()->getValue());
        $this->assertEquals('south', Direction::SOUTH()->getValue());
        $this->assertEquals('south_west', Direction::SOUTH_WEST()->getValue());
        $this->assertEquals('west', Direction::WEST()->getValue());
        $this->assertEquals('north_west', Direction::NORTH_WEST()->getValue());
    }

    public function testNormalization()
    {
        $this->assertTrue(false);

    }
    public function testCreationByLocations()
    {
        $this->assertTrue(false);

    }
    public function testCreationByDistance()
    {
        $this->assertTrue(false);

    }
}