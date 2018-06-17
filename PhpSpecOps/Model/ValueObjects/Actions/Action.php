<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:02
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Actions;
use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\Direction;


/**
 * Class Action
 * @package PhpSpecOps\ValueObjects\Actions
 * @method static Action OPEN(Direction $direction)
 * @method static Action CLOSE(Direction $direction)
 * @method static Action ACTIVATE(Direction $direction)
 * @method static Action DEACTIVATE(Direction $direction)
 */
class Action extends AbstractAction
{
    const LOOK = 'look';
    const FEEL = 'feel';
    const TASTE = 'taste';
    const SMELL = 'smell';
    const GRAB = 'grab';
    const PUT = 'put';
    const CLOSE = 'close';
    const ACTIVATE = 'activate';
    const DEACTIVATE = 'deactivate';

    protected function __construct(string $action, Direction $direction)
    {
        parent::__construct($action, $direction);
    }


    /**
     * @param $name
     * @param $arguments
     * @return Action
     * @throws \Assert\AssertionFailedException
     */
    public static function __callStatic($name, $arguments)
    {
        $direction = $arguments;
        if(is_array($arguments)){
            $direction = $arguments[0];
        }
        /** @var Direction $direction */
        Assertion::notInArray($direction->getValue(),[Direction::DOWN,Direction::UP]);
        return new static(constant('self::'.$name), $direction);
    }


}