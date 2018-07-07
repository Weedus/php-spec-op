<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:55
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions;

use Weedus\PhpSpecOps\Core\Model\Area\Direction;


/**
 * Class FinalAction
 * @package PhpSpecOps\ValueObjects\Actions
 * @method static FinalAction MOVE(Direction $direction)
 * @method static FinalAction ATTACK(Direction $direction)
 * @method static FinalAction REST(?Direction $direction = null)
 * @method static FinalAction PREPARE(?Direction $direction = null)
 * @method static FinalAction PERFORM(?Direction $direction = null)
 */
class FinalAction extends AbstractAction
{
    const MOVE = 'move';
    const ATTACK = 'attack';
    const REST = 'rest';
    const PREPARE = 'prepare';
    const PERFORM = 'perform';

    protected function __construct(string $action, ?Direction $direction=null)
    {
        parent::__construct($action, $direction);
    }


    /**
     * @param $name
     * @param $arguments
     * @return FinalAction
     */
    public static function __callStatic($name, $arguments)
    {
        $direction = null;
        if (!empty($arguments)) {
            $direction = $arguments[0];
        }
        /** @var Direction $direction */
        return new static(constant('self::' . $name), $direction);
    }


}