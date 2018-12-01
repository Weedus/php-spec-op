<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 15:25
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support;

use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;
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
    /** @var SupportItemType */
    protected $supportItemType;

    public function __construct(
        string $name,
        string $text,
        EffectInterface $effect,
        Range $range,
        SupportItemType $supportItemType
    ) {
        parent::__construct($name, ItemType::SUPPORT());
        $this->text = $text;
        $this->effect = $effect;
        $this->range = $range;
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
            && $this->range->equals($item->getRange())
            && $this->equalsSupportItemType($item)
            && parent::equals($item);
    }

    /**
     * @param SupportItemInterface $item
     *
     * @return bool
     */
    public function equalsSupportItemType(SupportItemInterface $item): bool
    {
        return $this->supportItemType->equals($item->getSupportItemType());
    }

    /**
     * @return SupportItemType
     */
    public function getSupportItemType(): SupportItemType
    {
        return $this->supportItemType;
    }
}