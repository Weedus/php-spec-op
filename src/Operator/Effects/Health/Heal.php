<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:40
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Health;

use Weedus\Exceptions\InvalidArgumentException;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

class Heal extends AbstractEffect
{
    /** @var int */
    protected $value;

    public function __construct(int $value)
    {
        if($value <= 0){
            throw new InvalidArgumentException('greater than zero',$value);
        }
        $this->value = $value;
        parent::__construct(0, 0, Range::ZERO());
    }

    public function perform(Field $caster, ?Field $target = null): void
    {
        $char = $caster->getCharacter();
        $char->addHealth($this->value);
    }
}