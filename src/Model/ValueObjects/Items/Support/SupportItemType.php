<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 26.06.18
 * Time: 09:35
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Support;


use Weedus\PhpSpecOps\Model\OptionsObjectTrait;
use Weedus\PhpSpecOps\Model\ValueObjects\AbstractValueObject;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\ArmorType;

/**
 * Class SupportItemType
 * @package Weedus\PhpSpecOps\Model\ValueObjects\Items\Support
 * @method static SupportItemType FLASK()
 * @method static SupportItemType KEY()
 */
class SupportItemType extends AbstractValueObject
{
    use OptionsObjectTrait;

    const FLASK = 'flask';
    const KEY = 'key';
}