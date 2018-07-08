<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Body\Human;


use Weedus\PhpSpecOps\Core\Model\Body\Body;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Head\ArmorHeadInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Legs\ArmorLegsInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\WeaponInterface;

class HumanBody extends Body implements HumanBodyInterface
{
    /** @var WeaponInterface|null */
    protected $leftHand = null;
    /** @var WeaponInterface|null */
    protected $rightHand = null;
    /** @var ArmorHeadInterface|null */
    protected $head = null;
    /** @var ArmorLegsInterface|null */
    protected $legs = null;

    /**
     * @return null|WeaponInterface
     */
    public function getLeftHand(): ?WeaponInterface
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
     * @return null|WeaponInterface
     */
    public function getRightHand(): ?WeaponInterface
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
     * @return null|ArmorHeadInterface
     */
    public function getHead(): ?ArmorHeadInterface
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
     * @return null|ArmorLegsInterface
     */
    public function getLegs(): ?ArmorLegsInterface
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
}