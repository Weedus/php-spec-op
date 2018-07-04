<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:40
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Health;


use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

class Heal extends AbstractEffect
{
    /** @var int */
    protected $value;

    /**
     * Heal constructor.
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
        $char->addHealth($this->value);
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