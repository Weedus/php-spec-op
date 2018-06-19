<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 22:06
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Health;


use Assert\Assertion;
use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Operator\Effects\AbstractEffect;

class Damage extends AbstractEffect
{
    /** @var int */
    protected $value;

    /**
     * Damage constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assertion::greaterOrEqualThan($value, 0);
        $this->value = $value;
    }

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::ZERO();
    }

    public function perform(Field $caster, ?Field $target = null): void
    {
        $char = $caster->getCharacter();
        /** @var CharacterEffectInterface $char */
        $char->subHealth($this->value);
    }


    /**
     * @param null $value
     * @return mixed|Heal
     * @throws \Assert\AssertionFailedException
     */
    public static function create($value = null)
    {
        Assertion::integer($value);
        return new static($value);
    }
}