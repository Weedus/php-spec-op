<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 15:25
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Support;

use Assert\Assertion;
use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Distance;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Operator\Effects\EffectInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\AbstractItem;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;

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

    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof AbstractSupportItem)){
            return false;
        }
        return $this->text === $item->text
            && parent::equals($item);
    }

    /**
     * @param Field $caster
     * @param Field $target
     * @throws \Weedus\PhpSpecOps\Exceptions\DistanceCalculationFailedException
     */
    public function perform(Field $caster, Field $target): void
    {
        $distance = $caster->getDistanceTo($target);
        if ($this->range->isReachable($distance)) {
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