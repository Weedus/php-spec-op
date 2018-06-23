<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:08
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon;

use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\AbstractItem;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemType;

abstract class AbstractWeapon extends AbstractItem implements WeaponInterface
{
    /** @var int */
    protected $power;
    /** @var int */
    protected $defense;
    /** @var Range */
    protected $minRange;
    /** @var Range */
    protected $maxRange;

    public function __construct(string $name, int $power, int $defense, Range $minRange, Range $maxRange)
    {
        parent::__construct($name, ItemType::WEAPON());
        $this->power = $power;
        $this->defense = $defense;
        $this->minRange = $minRange;
        $this->maxRange = $maxRange;
    }

    public function equals(Equalizeable $item): bool
    {
        Assertion::isInstanceOf($item, self::class);
        /** @var AbstractWeapon $item */
        return $this->minRange->equals($item->minRange)
            && $this->maxRange->equals($item->maxRange)
            && $this->power === $item->power
            && $this->defense === $item->defense
            && parent::equals($item);
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @return Range
     */
    public function getMinRange(): Range
    {
        return $this->minRange;
    }

    /**
     * @return Range
     */
    public function getMaxRange(): Range
    {
        return $this->maxRange;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }
}