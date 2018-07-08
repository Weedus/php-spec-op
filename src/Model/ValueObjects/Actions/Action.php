<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:02
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions;

use Weedus\PhpSpecOps\Core\Model\Area\Direction;


/**
 * Class Action
 *
 * @package PhpSpecOps\ValueObjects\Actions
 * @method static Action LOOK(Direction $direction)
 * @method static Action FEEL(Direction $direction)
 * @method static Action TASTE(?Direction $direction = null)
 * @method static Action SMELL(?Direction $direction = null)
 * @method static Action HEAR(?Direction $direction = null)
 * @method static Action GRAB(Direction $direction)
 * @method static Action PUT(Direction $direction)
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
    const HEAR = 'hear';
    const GRAB = 'grab';
    const PUT = 'put';
    const OPEN = 'open';
    const CLOSE = 'close';
    const ACTIVATE = 'activate';
    const DEACTIVATE = 'deactivate';

    protected function __construct(string $action, ?Direction $direction = null)
    {
        parent::__construct($action, $direction);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return Action
     */
    public static function __callStatic($name, $arguments)
    {
        $direction = null;
        if (!empty($arguments)) {
            $direction = $arguments[0];
        }
        return new static(constant('self::' . $name), $direction);
    }
}