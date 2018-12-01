<?php

namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Weedus\PhpSpecOps\Core\Tests\_support\self\ObjectCreationTrait;

class Unit extends \Codeception\Module
{
    use ObjectCreationTrait;
}
