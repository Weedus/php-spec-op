<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 14:45
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor;


use Weedus\PhpSpecOps\Model\OptionsObjectTrait;
use Weedus\PhpSpecOps\Model\ValueObjects\AbstractValueObject;

/**
 * Class ArmorType
 * @package Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor
 * @method static ArmorType CHEST()
 * @method static ArmorType HEAD()
 * @method static ArmorType LEGS()
 */
class ArmorType extends AbstractValueObject
{
    use OptionsObjectTrait;

    const CHEST = 'chest';
    const HEAD = 'head';
    const LEGS = 'legs';
}