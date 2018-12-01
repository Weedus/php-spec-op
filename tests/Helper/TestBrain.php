<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.07.18
 * Time: 23:03
 */

namespace Weedus\PhpSpecOps\Core\Tests\Helper;


use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;
use Weedus\PhpSpecOps\Core\Model\Brain\SituationInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\ActionInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\FinalAction;

class TestBrain implements BrainInterface
{
    /** @var ActionInterface */
    protected $action;

    /**
     * TestBrain constructor.
     *
     * @param ActionInterface $action
     */
    public function __construct(ActionInterface $action)
    {
        $this->action = $action;
    }

    public function solve(SituationInterface $situation): ActionInterface
    {
        return $this->action;
    }
}