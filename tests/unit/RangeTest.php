<?php namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\PhpSpecOps\Model\ValueObjects\Distance;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

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
        $r0 = Range::ZERO();
        $r1 = Range::LOW();
        $r2 = Range::MEDIUM();
        $r3 = Range::HIGH();

        $this->assertEquals('zero',$r0->getValue());
        $this->assertEquals('low',$r1->getValue());
        $this->assertEquals('medium',$r2->getValue());
        $this->assertEquals('high',$r3->getValue());

        $d0 = Distance::create(0,0);
        $d1 = Distance::create(1,0);
        $d2 = Distance::create(2,0);
        $d3 = Distance::create(3,0);
        $d4 = Distance::create(4,0);
        $d5 = Distance::create(5,0);
        $d6 = Distance::create(6,0);

        $this->assertTrue($r0->isReachable($d0));
        $this->assertFalse($r0->isReachable($d1));
        $this->assertFalse($r0->isReachable($d2));
        $this->assertFalse($r0->isReachable($d3));
        $this->assertFalse($r0->isReachable($d4));
        $this->assertFalse($r0->isReachable($d5));
        $this->assertFalse($r0->isReachable($d6));

        $this->assertTrue($r1->isReachable($d0));
        $this->assertTrue($r1->isReachable($d1));
        $this->assertFalse($r1->isReachable($d2));
        $this->assertFalse($r1->isReachable($d3));
        $this->assertFalse($r1->isReachable($d4));
        $this->assertFalse($r1->isReachable($d5));
        $this->assertFalse($r1->isReachable($d6));

        $this->assertTrue($r2->isReachable($d0));
        $this->assertTrue($r2->isReachable($d1));
        $this->assertTrue($r2->isReachable($d2));
        $this->assertTrue($r2->isReachable($d3));
        $this->assertFalse($r2->isReachable($d4));
        $this->assertFalse($r2->isReachable($d5));
        $this->assertFalse($r2->isReachable($d6));

        $this->assertTrue($r3->isReachable($d0));
        $this->assertTrue($r3->isReachable($d1));
        $this->assertTrue($r3->isReachable($d2));
        $this->assertTrue($r3->isReachable($d3));
        $this->assertTrue($r3->isReachable($d4));
        $this->assertTrue($r3->isReachable($d5));
        $this->assertFalse($r3->isReachable($d6));
    }
}