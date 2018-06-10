<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace PhpSpecOps\ValueObjects\Body\Human;


use PhpSpecOps\ValueObjects\Body\Body;
use PhpSpecOps\ValueObjects\Equalizeable;
use PhpSpecOps\ValueObjects\Items\Armor\Head\ArmorHeadInterface;
use PhpSpecOps\ValueObjects\Items\Armor\Head\ArmorLegsInterface;
use PhpSpecOps\ValueObjects\Items\Weapon\WeaponInterface;

class HumanBody extends Body implements HumanBodyInterface
{

    /** @var WeaponInterface */
    protected $leftHand;
    /** @var WeaponInterface */
    protected $rightHand;

    /** @var ArmorHeadInterface */
    protected $head;
    /** @var ArmorLegsInterface */
    protected $legs;

    /**
     * @return WeaponInterface
     */
    public function getLeftHand(): WeaponInterface
    {
        return $this->leftHand;
    }

    /**
     * @param WeaponInterface $leftHand
     */
    public function setLeftHand(WeaponInterface $leftHand): void
    {
        $this->leftHand = $leftHand;
    }

    /**
     * @return WeaponInterface
     */
    public function getRightHand(): WeaponInterface
    {
        return $this->rightHand;
    }

    /**
     * @param WeaponInterface $rightHand
     */
    public function setRightHand(WeaponInterface $rightHand): void
    {
        $this->rightHand = $rightHand;
    }

    /**
     * @return ArmorHeadInterface
     */
    public function getHead(): ArmorHeadInterface
    {
        return $this->head;
    }

    /**
     * @param ArmorHeadInterface $head
     */
    public function setHead(ArmorHeadInterface $head): void
    {
        $this->head = $head;
    }

    /**
     * @return ArmorLegsInterface
     */
    public function getLegs(): ArmorLegsInterface
    {
        return $this->legs;
    }

    /**
     * @param ArmorLegsInterface $legs
     */
    public function setLegs(ArmorLegsInterface $legs): void
    {
        $this->legs = $legs;
    }


    public function toArray(): array
    {
        return [
                'left_hand' => $this->leftHand->toArray(),
                'right_hand' => $this->rightHand->toArray(),
                'head' => $this->head->toArray(),
                'legs' => $this->legs->toArray(),
            ] + parent::toArray();
    }

    public function equals(Equalizeable $item): bool
    {
        if (!($item instanceof HumanBody)) {
            return false;
        }
        return $this->leftHand->equals($item->leftHand)
            && $this->rightHand->equals($item->rightHand)
            && $this->head->equals($item->head)
            && $this->legs->equals($item->legs)
            && parent::equals($item);
    }


}