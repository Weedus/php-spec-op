<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 22:39
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Legs;


use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\AbstractArmor;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\ArmorType;

abstract class AbstractArmorLegs extends AbstractArmor implements ArmorLegsInterface
{
    public function __construct(string $name, int $defense)
    {
        parent::__construct($name, $defense, ArmorType::LEGS());
    }
}