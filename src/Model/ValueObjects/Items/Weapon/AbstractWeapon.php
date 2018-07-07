<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:08
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon;

use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\AbstractItem;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemType;

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
    /** @var WeaponType */
    protected $weaponType;

    public function __construct(string $name, int $power, int $defense, Range $minRange, Range $maxRange, WeaponType $weaponType)
    {
        parent::__construct($name, ItemType::WEAPON());
        $this->power = $power;
        $this->defense = $defense;
        $this->minRange = $minRange;
        $this->maxRange = $maxRange;
        $this->weaponType = $weaponType;
    }

    /**
     * @param Equalizeable $item
     * @return bool
     */
    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof AbstractWeapon)) {
            return false;
        }
        return $this->minRange->equals($item->minRange)
            && $this->maxRange->equals($item->maxRange)
            && $this->power === $item->power
            && $this->defense === $item->defense
            && $this->equalsWeaponType($item)
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

    public function getWeaponType(): WeaponType
    {
        return $this->weaponType;
    }

    public function equalsWeaponType(WeaponInterface $weapon): bool
    {
        return $this->weaponType->equals($weapon->getWeaponType());
    }


}