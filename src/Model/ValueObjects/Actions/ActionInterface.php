<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:53
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Actions;

use Weedus\PhpSpecOps\Model\ValueObjects\Direction;

interface ActionInterface
{
    public function getAction(): string;
    public function getDirection(): Direction;
}