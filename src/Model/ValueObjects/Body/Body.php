<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:34
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Body;


use Weedus\PhpSpecOps\Model\ValueObjects\AbstractValueObject;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorChestInterface;

class Body extends AbstractValueObject implements BodyInterface
{

    /** @var ArmorChestInterface */
    protected $chest;


    public function getChest(): ArmorChestInterface
    {
        return $this->chest;
    }

    /**
     * @param ArmorChestInterface $armorChest
     */
    public function setArmorChest(ArmorChestInterface $chest): void
    {
        $this->chest = $chest;
    }


    public function equals(Equalizeable $item): bool
    {
        if (!($item instanceof Body)) {
            return false;
        }
        return $this->chest->equals($item->chest);
    }
}