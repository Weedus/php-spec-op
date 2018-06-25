<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 14:29
 */

namespace Weedus\PhpSpecOps\Specifications;


use Weedus\Specification\SpecificationInterface;

class AlwaysTrue implements SpecificationInterface
{

    public function isSatisfiedBy($item): bool
    {
        return true;
    }
}