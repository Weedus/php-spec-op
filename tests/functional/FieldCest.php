<?php

namespace Weedus\Tests\PhpSpecOps\functional;

use Weedus\Exceptions\NotYetImplementedException;

class FieldCest
{
    public function _before(\FunctionalTester $I)
    {

    }

    public function _after(\FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(\FunctionalTester $I)
    {
        throw new NotYetImplementedException(__METHOD__);

    }
}
