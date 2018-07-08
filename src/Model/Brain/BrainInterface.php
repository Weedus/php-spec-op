<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.07.18
 * Time: 22:34
 */

namespace Weedus\PhpSpecOps\Core\Model\Brain;


use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\ActionInterface;

interface BrainInterface
{
    public function solve(SituationInterface $situation): ActionInterface;
}