<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 09:43
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions;


use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\AbstractValueObject;

abstract class AbstractAction extends AbstractValueObject implements ActionInterface
{
    /** @var string */
    private $action;
    /** @var Direction|null */
    private $direction;

    /**
     * AbstractAction constructor.
     *
     * @param string    $action
     * @param Direction $direction
     */
    public function __construct(string $action, ?Direction $direction = null)
    {
        $this->action = $action;
        $this->direction = $direction;
    }

    /**
     * @param Equalizeable $item
     *
     * @return bool
     */
    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof ActionInterface)) {
            return false;
        }
        $directionCompare = $this->direction
            ? $this->direction->equals($item->getDirection())
            : $this->direction === $item->getDirection();
        return $this->action === $item->getAction()
            && $directionCompare;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getDirection(): ?Direction
    {
        return $this->direction;
    }
}