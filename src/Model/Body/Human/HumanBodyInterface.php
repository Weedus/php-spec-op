<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:37
 */

namespace Weedus\PhpSpecOps\Core\Model\Body\Human;


use Weedus\PhpSpecOps\Core\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Head\ArmorHeadInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Head\ArmorLegsInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\WeaponInterface;

interface HumanBodyInterface extends BodyInterface
{

    public function getLeftHand(): WeaponInterface;

    public function getRightHand(): WeaponInterface;

    public function getHead(): ArmorHeadInterface;

    public function getLegs(): ArmorLegsInterface;

}