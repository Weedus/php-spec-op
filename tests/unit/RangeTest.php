<?php namespace Weedus\PhpSpecOps\Core\Tests\unit;


use Weedus\PhpSpecOps\Core\Model\Area\Distance;
use Weedus\PhpSpecOps\Core\Model\Area\Range;

class RangeTest extends \Codeception\Test\Unit
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
    public function testCreationAndInRange()
    {
        $range0 = Range::ZERO();
        $range1 = Range::LOW();
        $range2 = Range::MEDIUM_LOW();
        $range3 = Range::MEDIUM();
        $range4 = Range::MEDIUM_HIGH();
        $range5 = Range::HIGH();

        $this->assertEquals(0, $range0->getValue());
        $this->assertEquals(1, $range1->getValue());
        $this->assertEquals(2, $range2->getValue());
        $this->assertEquals(4, $range3->getValue());
        $this->assertEquals(5, $range4->getValue());
        $this->assertEquals(6, $range5->getValue());

        $distance0 = Distance::create(0, 0);
        $distance1 = Distance::create(1, 0);
        $distance2 = Distance::create(2, 0);
        $distance3 = Distance::create(3, 0);
        $distance4 = Distance::create(4, 0);
        $distance5 = Distance::create(5, 0);
        $distance6 = Distance::create(6, 0);
        $distance7 = Distance::create(7, 0);

        $this->assertTrue($range0->isReachable($distance0));
        $this->assertFalse($range0->isReachable($distance1));
        $this->assertFalse($range0->isReachable($distance2));
        $this->assertFalse($range0->isReachable($distance3));
        $this->assertFalse($range0->isReachable($distance4));
        $this->assertFalse($range0->isReachable($distance5));
        $this->assertFalse($range0->isReachable($distance6));
        $this->assertFalse($range0->isReachable($distance7));

        $this->assertTrue($range1->isReachable($distance0));
        $this->assertTrue($range1->isReachable($distance1));
        $this->assertFalse($range1->isReachable($distance2));
        $this->assertFalse($range1->isReachable($distance3));
        $this->assertFalse($range1->isReachable($distance4));
        $this->assertFalse($range1->isReachable($distance5));
        $this->assertFalse($range1->isReachable($distance6));
        $this->assertFalse($range1->isReachable($distance7));

        $this->assertTrue($range2->isReachable($distance0));
        $this->assertTrue($range2->isReachable($distance1));
        $this->assertTrue($range2->isReachable($distance2));
        $this->assertFalse($range2->isReachable($distance3));
        $this->assertFalse($range2->isReachable($distance4));
        $this->assertFalse($range2->isReachable($distance5));
        $this->assertFalse($range2->isReachable($distance6));
        $this->assertFalse($range2->isReachable($distance7));

        $this->assertTrue($range3->isReachable($distance0));
        $this->assertTrue($range3->isReachable($distance1));
        $this->assertTrue($range3->isReachable($distance2));
        $this->assertTrue($range3->isReachable($distance3));
        $this->assertTrue($range3->isReachable($distance4));
        $this->assertFalse($range3->isReachable($distance5));
        $this->assertFalse($range3->isReachable($distance6));
        $this->assertFalse($range3->isReachable($distance7));

        $this->assertTrue($range4->isReachable($distance0));
        $this->assertTrue($range4->isReachable($distance1));
        $this->assertTrue($range4->isReachable($distance2));
        $this->assertTrue($range4->isReachable($distance3));
        $this->assertTrue($range4->isReachable($distance4));
        $this->assertTrue($range4->isReachable($distance5));
        $this->assertFalse($range4->isReachable($distance6));
        $this->assertFalse($range4->isReachable($distance7));

        $this->assertTrue($range5->isReachable($distance0));
        $this->assertTrue($range5->isReachable($distance1));
        $this->assertTrue($range5->isReachable($distance2));
        $this->assertTrue($range5->isReachable($distance3));
        $this->assertTrue($range5->isReachable($distance4));
        $this->assertTrue($range5->isReachable($distance5));
        $this->assertTrue($range5->isReachable($distance6));
        $this->assertFalse($range5->isReachable($distance7));
    }
}
