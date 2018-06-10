<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 15:25
 */

namespace PhpSpecOps\ValueObjects\Items\Support;

use Assert\Assertion;
use PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use PhpSpecOps\Model\ValueObjects\Equalizeable;
use PhpSpecOps\Model\ValueObjects\Range;
use PhpSpecOps\Operator\Effects\EffectInterface;
use PhpSpecOps\ValueObjects\Items\AbstractItem;
use PhpSpecOps\ValueObjects\Items\ItemType;

class AbstractSupportItem extends AbstractItem implements SupportItemInterface
{
    /** @var EffectInterface */
    protected $effect;
    /** @var string */
    protected $text;
    /** @var Range */
    protected $range;
    /** @var int */
    protected $preparationTime;
    /** @var int */
    protected $duration;

    public function __construct(
        string $name,
        string $text,
        EffectInterface $effect,
        Range $range,
        int $preparationTime,
        int $duration
    )
    {
        parent::__construct($name, ItemType::SUPPORT());
        $this->text = $text;
        $this->effect = $effect;
        $this->range = $range;
        $this->preparationTime = $preparationTime;
        $this->duration = $duration;
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function getRange(): Range
    {
        return $this->range;
    }

    public function toArray(): array
    {
        return [
                'text' => $this->text,
            ] + parent::toArray();
    }

    public function equals(Equalizeable $item): bool
    {
        Assertion::isInstanceOf($item, self::class);
        /** @var AbstractSupportItem $item */
        return $this->text === $item->text
            && parent::equals($item);
    }

    /**
     * @param CharacterEffectInterface $caster
     * @param CharacterEffectInterface $target
     */
    public function perform(CharacterEffectInterface $caster, CharacterEffectInterface $target): void
    {
        if ($target->isInRange($caster, $this->range)) {
            $this->effect->perform($target);
        }
    }

    /**
     * @return int
     */
    public function getPreparationTime(): int
    {
        return $this->preparationTime;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
}