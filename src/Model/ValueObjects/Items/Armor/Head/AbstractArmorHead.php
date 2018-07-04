<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 22:39
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Head;


use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\AbstractArmor;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\ArmorType;

abstract class AbstractArmorHead extends AbstractArmor implements ArmorHeadInterface
{
    public function __construct(string $name, int $defense)
    {
        parent::__construct($name, $defense, ArmorType::HEAD());
    }

}