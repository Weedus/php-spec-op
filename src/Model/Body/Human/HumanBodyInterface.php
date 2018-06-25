<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:37
 */

namespace Weedus\PhpSpecOps\Model\Body\Human;


use Weedus\PhpSpecOps\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorHeadInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorLegsInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\WeaponInterface;

interface HumanBodyInterface extends BodyInterface
{

    public function getLeftHand(): WeaponInterface;

    public function getRightHand(): WeaponInterface;

    public function getHead(): ArmorHeadInterface;

    public function getLegs(): ArmorLegsInterface;

}