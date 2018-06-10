<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:32
 */

namespace PhpSpecOps\ValueObjects\CharacterWrapper;


use Assert\Assertion;
use PhpSpecOps\Container\CollectionInterface;
use PhpSpecOps\Model\Entities\Units\Characters\Humans\SpecOp;
use PhpSpecOps\ValueObjects\Body\BodyInterface;
use PhpSpecOps\ValueObjects\Range;

class SpecOpWrapper extends AbstractWrapper implements AbstractHumanWrapperInterface
{
    /** @var SpecOp */
    private $item;

    public function __construct($item)
    {
        Assertion::isInstanceOf($item, SpecOp::class);
        parent::__construct($item);
    }


    public function getMaxHealth(): int
    {
        return $this->item->getMaxHealth();
    }

    public function getHealth(): int
    {
        $this->item->getHealth();
    }

    public function getPower(): int
    {
        $this->item->getPower();
    }

    public function getSight(): Range
    {
        $this->item->getSight();
    }

    public function getBody(): BodyInterface
    {
        return $this->item->getBody();
    }

    public function getInventory(): CollectionInterface
    {
        return $this->item->getInventory();
    }
}