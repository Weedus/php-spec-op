<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:23
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans;

use Ramsey\Uuid\Uuid;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;

class Human extends AbstractHuman
{
    public function __construct(BrainInterface $brain, ?string $name = null, ?Uuid $id = null)
    {
        parent::__construct($name ?? 'Human', 30, 3, Range::HIGH(), $brain, $id);
    }
}