<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace PhpSpecOps\Model\Entities\Units\Characters\Humans;


use Assert\Assertion;
use PhpSpecOps\Container\CollectionInterface;
use PhpSpecOps\Model\Entities\Units\Characters\AbstractCharacter;
use PhpSpecOps\ValueObjects\Body\BodyInterface;
use PhpSpecOps\ValueObjects\Body\Human\HumanBodyInterface;

abstract class AbstractHuman extends AbstractCharacter implements HumanInterface
{
    /** @var CollectionInterface */
    protected $inventory;

    /**
     * @param BodyInterface $body
     * @throws \Assert\AssertionFailedException
     */
    public function setBody(BodyInterface $body): void
    {
        Assertion::isInstanceOf($body, HumanBodyInterface::class);
        parent::setBody($body);
    }

    public function getInventory(): CollectionInterface
    {
        return $this->inventory;
    }

    /**
     * @param CollectionInterface $inventory
     */
    public function setInventory(CollectionInterface $inventory): void
    {
        $this->inventory = $inventory;
    }


    public function toArray(): array
    {
        return [
                'inventory' => $this->inventory
            ] + parent::toArray();
    }

}