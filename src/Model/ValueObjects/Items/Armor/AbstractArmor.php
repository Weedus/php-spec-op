<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 15:10
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor;


use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\AbstractItem;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemType;

abstract class AbstractArmor extends AbstractItem implements ArmorInterface
{
    /** @var ArmorType */
    protected $armorType;
    /** @var int */
    protected $defense;

    public function __construct(string $name, int $defense, ArmorType $armorType)
    {
        parent::__construct($name, ItemType::ARMOR());
        $this->defense = $defense;
        $this->armorType = $armorType;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getArmorType(): ArmorType
    {
        return $this->armorType;
    }

    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof ArmorInterface)) {
            return false;
        }
        return $this->equalsArmorType($item) && parent::equals($item);
    }

    /**
     * @param ArmorInterface $item
     *
     * @return bool
     */
    public function equalsArmorType(ArmorInterface $item): bool
    {
        return $this->armorType->equals($item->getArmorType());
    }
}