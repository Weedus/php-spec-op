<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:10
 */

namespace Weedus\PhpSpecOps\Model\Units\Characters\Humans;


use PascalDeVink\ShortUuid\ShortUuid;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

class SpecOp extends AbstractHuman
{

    public function __construct(?ShortUuid $id = null)
    {
        $this->sight = Range::HIGH();
        $this->maxHealth = 35;
        $this->power = 3;
        parent::__construct($name ?? 'SpecOp', $id);
    }
}