<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 26.06.18
 * Time: 09:35
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support;


use Weedus\PhpSpecOps\Core\Model\OptionsObjectTrait;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\AbstractValueObject;

/**
 * Class SupportItemType
 * @package Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support
 * @method static SupportItemType FLASK()
 * @method static SupportItemType KEY()
 */
class SupportItemType extends AbstractValueObject
{
    use OptionsObjectTrait;

    const FLASK = 'flask';
    const KEY = 'key';
}