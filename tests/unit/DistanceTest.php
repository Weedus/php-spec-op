<?php

namespace Weedus\PhpSpecOps\Core\Tests\unit;


use Weedus\PhpSpecOps\Core\Exceptions\DistanceCalculationFailedException;
use Weedus\PhpSpecOps\Core\Model\Area\Distance;
use Weedus\PhpSpecOps\Core\Model\Area\Location;

class DistanceTest extends \Codeception\Test\Unit
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
        $x = 5;
        $y = -5;
        $steps = 10;
        $amount = (int)sqrt(50);
        $distance = Distance::create(5, -5);

        $this->makeTest($distance, $x, $y, $amount, $steps);
    }

    /**
     * @throws \Weedus\PhpSpecOps\Core\Exceptions\DistanceCalculationFailedException
     */
    public function testCreateByLocations()
    {
        $heightsFailed = false;
        try {
            Distance::createByLocations(
                Location::create(0, 0, 0),
                Location::create(0, 1, 1)
            );
        } catch (\Exception $exception) {
            $heightsFailed = true;
            $this->assertInstanceOf(DistanceCalculationFailedException::class, $exception);
            $this->assertContains('start and goal on different heights', $exception->getMessage());
        }
        $this->assertTrue($heightsFailed);

        $start = new Location(0, 0, 0);
        $goal = new Location(5, 0, 0);
        $distance = Distance::createByLocations($start, $goal);
        $x = 5;
        $y = 0;
        $steps = 5;
        $amount = 5;
        $this->makeTest($distance, $x, $y, $amount, $steps);
    }

    private function makeTest(Distance $distance, $x, $y, $amount, $steps)
    {
        $this->assertEquals($x, $distance->getX());
        $this->assertEquals($y, $distance->getY());
        $this->assertEquals($amount, $distance->get());
        $this->assertEquals($steps, $distance->getSteps());
    }
}