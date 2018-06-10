<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:37
 */

namespace PhpSpecOps\ValueObjects\Body\Human;


use PhpSpecOps\ValueObjects\Body\BodyInterface;
use PhpSpecOps\ValueObjects\Items\Armor\Head\ArmorHeadInterface;
use PhpSpecOps\ValueObjects\Items\Armor\Head\ArmorLegsInterface;
use PhpSpecOps\ValueObjects\Items\Weapon\WeaponInterface;

interface HumanBodyInterface extends BodyInterface
{

    public function getLeftHand(): WeaponInterface;

    public function getRightHand(): WeaponInterface;

    public function getHead(): ArmorHeadInterface;

    public function getLegs(): ArmorLegsInterface;

}