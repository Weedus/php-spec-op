<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:32
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\CharacterWrapper;


use Assert\Assertion;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\Humans\SpecOp;
use Weedus\PhpSpecOps\Model\Storage\CollectionInterface;
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