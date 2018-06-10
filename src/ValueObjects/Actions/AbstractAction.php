<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:43
 */

namespace PhpSpecOps\ValueObjects\Actions;


use PhpSpecOps\ValueObjects\AbstractValueObject;
use PhpSpecOps\ValueObjects\Direction;
use PhpSpecOps\ValueObjects\Equalizeable;

class AbstractAction extends AbstractValueObject implements ActionInterface
{

    /** @var string */
    private $action;
    /** @var Direction */
    private $direction;

    /**
     * AbstractAction constructor.
     * @param string $action
     * @param Direction $direction
     */
    public function __construct(string $action, Direction $direction)
    {
        $this->action = $action;
        $this->direction = $direction;
    }
    /** @return array */
    public function toArray(): array
    {
        return [
            'action' => $this->action,
            'direction' => $this->direction->toArray()
        ];
    }

    /**
     * @param Equalizeable $item
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof AbstractAction)){
            return false;
        }
        return $this->action === $item->action
            && $this->direction->equals($item->direction);
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }
}