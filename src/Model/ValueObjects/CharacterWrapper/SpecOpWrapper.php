<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:32
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\CharacterWrapper;


use Assert\Assertion;
use Weedus\Collection\CollectionInterface;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\Humans\SpecOp;
use Weedus\PhpSpecOps\Model\ValueObjects\Body\BodyInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

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
        return $this->item->getHealth();
    }

    public function getPower(): int
    {
        return $this->item->getPower();
    }

    public function getSight(): Range
    {
        return $this->item->getSight();
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