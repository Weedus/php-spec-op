<?php

namespace Weedus\Tests\PhpSpecOps\functional;

use Assert\Assertion;
use Weedus\Exceptions\NotYetImplementedException;

class PlaceCest
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
        throw new NotYetImplementedException();

    }
}