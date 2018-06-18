<?php

namespace Weedus\Tests\PhpSpecOps\unit;

use Weedus\Exceptions\NotYetImplementedException;

class StandingTest extends \Codeception\Test\Unit
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
    public function testSomeFeature()
    {
        throw new NotYetImplementedException();
    }
}