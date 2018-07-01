<?php

namespace Weedus\PhpSpecOps\Core\Tests\unit;


use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Area\Distance;
use Weedus\PhpSpecOps\Core\Model\Area\Location;

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
        try {
            Direction::create('blub');
        } catch (\Exception $exception) {
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
        $this->assertEquals('none', Direction::NONE()->getValue());
    }

    public function testNormalization()
    {
        $start = Location::create(0, 0, 0);
        $end1 = Location::create(-3, -4, 0);
        $end2 = Location::create(1, 0, 0);
        $end3 = Location::create(5, 5, 0);
        $end4 = Location::create(0, 0, 0);

        $norm1 = Direction::getNormalizedDirection($start, $end1);
        $norm2 = Direction::getNormalizedDirection($start, $end2);
        $norm3 = Direction::getNormalizedDirection($start, $end3);
        $norm4 = Direction::getNormalizedDirection($start, $end4);

        $this->assertEquals(['x' => 0, 'y' => -1], $norm1);
        $this->assertEquals(['x' => 1, 'y' => 0], $norm2);
        $this->assertEquals(['x' => 1, 'y' => 1], $norm3);
        $this->assertEquals(['x' => 0, 'y' => 0], $norm4);

        $this->assertEquals(Direction::WEST, Direction::normalizedToHuman($norm1));
        $this->assertEquals(Direction::NORTH, Direction::normalizedToHuman($norm2));
        $this->assertEquals(Direction::NORTH_EAST, Direction::normalizedToHuman($norm3));
        $this->assertEquals(Direction::NONE, Direction::normalizedToHuman($norm4));

    }

    public function testCreationByLocations()
    {
        $start = Location::create(0, 0, 0);
        $end1 = Location::create(-3, -4, 0);
        $end2 = Location::create(1, 0, 0);
        $end3 = Location::create(5, 5, 0);
        $end4 = Location::create(0, 0, 0);

        $this->assertEquals(Direction::WEST, Direction::createByLocations($start, $end1)->getValue());
        $this->assertEquals(Direction::NORTH, Direction::createByLocations($start, $end2)->getValue());
        $this->assertEquals(Direction::NORTH_EAST, Direction::createByLocations($start, $end3)->getValue());
        $this->assertEquals(Direction::NONE, Direction::createByLocations($start, $end4)->getValue());
    }

    /**
     * @throws \Weedus\PhpSpecOps\Core\Exceptions\DistanceCalculationFailedException
     */
    public function testCreationByDistance()
    {
        $start = Location::create(0, 0, 0);
        $end1 = Location::create(-3, -4, 0);
        $end2 = Location::create(1, 0, 0);
        $end3 = Location::create(5, 5, 0);
        $end4 = Location::create(0, 0, 0);

        $dis1 = Distance::createByLocations($start, $end1);
        $dis2 = Distance::createByLocations($start, $end2);
        $dis3 = Distance::createByLocations($start, $end3);
        $dis4 = Distance::createByLocations($start, $end4);

        $this->assertEquals(Direction::WEST, Direction::createByDistance($dis1)->getValue());
        $this->assertEquals(Direction::NORTH, Direction::createByDistance($dis2)->getValue());
        $this->assertEquals(Direction::NORTH_EAST, Direction::createByDistance($dis3)->getValue());
        $this->assertEquals(Direction::NONE, Direction::createByDistance($dis4)->getValue());

    }
}