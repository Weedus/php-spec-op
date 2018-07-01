<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 12:49
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items;

use Weedus\PhpSpecOps\Core\Model\OptionsObjectTrait;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\AbstractValueObject;

/**
 * Class ItemType
 * @package PhpSpecOps\ValueObjects\Items
 * @method static ItemType WEAPON()
 * @method static ItemType ARMOR()
 * @method static ItemType SUPPORT()
 */
class ItemType extends AbstractValueObject
{
    use OptionsObjectTrait;

    const WEAPON = 'weapon';
    const ARMOR = 'armor';
    const SUPPORT = 'support';
}