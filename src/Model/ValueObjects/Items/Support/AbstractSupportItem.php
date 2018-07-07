<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 15:25
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support;

use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\ActionInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\FinalAction;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\AbstractItem;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemType;
use Weedus\PhpSpecOps\Core\Operator\Effects\EffectInterface;

abstract class AbstractSupportItem extends AbstractItem implements SupportItemInterface
{
    /** @var EffectInterface */
    protected $effect;
    /** @var string */
    protected $text;
    /** @var Range */
    protected $range;
    /** @var int|null */
    protected $preparationTime;
    /** @var int|null */
    protected $duration;
    /** @var int|null */
    protected $utilizations;
    /** @var SupportItemType */
    protected $supportItemType;

    public function __construct(
        string $name,
        string $text,
        EffectInterface $effect,
        Range $range,
        int $preparationTime,
        int $duration,
        int $utilizations,
        SupportItemType $supportItemType
    )
    {
        parent::__construct($name, ItemType::SUPPORT());
        $this->text = $text;
        $this->effect = $effect;
        $this->range = $range;
        $this->preparationTime = $preparationTime;
        $this->duration = $duration;
        $this->utilizations = $utilizations;
        $this->supportItemType = $supportItemType;
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function getRange(): Range
    {
        return $this->range;
    }

    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof SupportItemInterface)) {
            return false;
        }
        return $this->text === $item->getText()
            && $this->duration === $item->getDuration()
            && $this->preparationTime === $item->getPreparationTime()
            && $this->range->equals($item->getRange())
            && $this->equalsSupportItemType($item)
            && parent::equals($item);
    }

    /**
     * @param null|Direction $direction
     * @return ActionInterface[]
     */
    public function getActions(?Direction $direction = null): array
    {
        $usage = [];

        for($i = 1; $i <= $this->preparationTime; $i++){
            $usage[] = FinalAction::PREPARE();
        }
        $usage[] = FinalAction::PERFORM($direction);

        return $usage;
    }


    /**
     * @return int|null
     */
    public function getPreparationTime(): ?int
    {
        return $this->preparationTime;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @return int|null
     */
    public function getUtilizations(): ?int
    {
        return $this->utilizations;
    }

    /**
     * @return SupportItemType
     */
    public function getSupportItemType(): SupportItemType
    {
        return $this->supportItemType;
    }

    /**
     * @param SupportItemInterface $item
     * @return bool
     */
    public function equalsSupportItemType(SupportItemInterface $item): bool
    {
        return $this->supportItemType->equals($item->getSupportItemType());
    }
}