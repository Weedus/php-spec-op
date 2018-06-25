<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace Weedus\PhpSpecOps\Model\Units\Characters\Humans;

use Assert\Assertion;
use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\PhpSpecOps\Model\Units\Characters\AbstractCharacter;
use Weedus\PhpSpecOps\Model\Units\Characters\BrainInterface;
use Weedus\PhpSpecOps\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Model\Body\Human\HumanBodyInterface;

abstract class AbstractHuman extends AbstractCharacter implements HumanInterface
{
    /** @var SpecificationCollectionInterface */
    protected $inventory;

    protected $brain;

    /**
     * @param BodyInterface $body
     * @throws \Assert\AssertionFailedException
     */
    public function setBody(BodyInterface $body): void
    {
        Assertion::isInstanceOf($body, HumanBodyInterface::class);
        parent::setBody($body);
    }

    public function getInventory(): SpecificationCollectionInterface
    {
        return $this->inventory;
    }

    /**
     * @param SpecificationCollectionInterface $inventory
     */
    public function setInventory(SpecificationCollectionInterface $inventory): void
    {
        $this->inventory = $inventory;
    }


    public function getBrain(): BrainInterface
    {
        return $this->brain;
    }

}