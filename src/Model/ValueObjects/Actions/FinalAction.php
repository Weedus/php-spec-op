<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:55
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Actions;

use Weedus\PhpSpecOps\Model\Area\Direction;


/**
 * Class FinalAction
 * @package PhpSpecOps\ValueObjects\Actions
 * @method static FinalAction MOVE(Direction $direction)
 * @method static FinalAction ATTACK(Direction $direction)
 * @method static FinalAction REST(Direction $direction)
 */
class FinalAction extends AbstractAction
{
    const MOVE = 'move';
    const ATTACK = 'attack';
    const REST = 'rest';

    protected function __construct(string $action, Direction $direction)
    {
        parent::__construct($action, $direction);
    }


    /**
     * @param $name
     * @param $arguments
     * @return FinalAction
     * @throws \Assert\AssertionFailedException
     */
    public static function __callStatic($name, $arguments)
    {
        $direction = $arguments;
        if (is_array($arguments)) {
            $direction = $arguments[0];
        }
        /** @var Direction $direction */
        return new static(constant('self::' . $name), $direction);
    }


}