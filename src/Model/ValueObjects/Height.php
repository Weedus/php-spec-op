<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:35
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects;


/**
 * Class Height
 * @package PhpSpecOps\ValueObjects
 * @method static Height LOW()
 * @method static Height MEDIUM()
 * @method static Height HIGH()
 */
class Height extends AbstractValueObject
{
    use OptionsObjectTrait;

    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
}