<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans;

use Ramsey\Uuid\Uuid;
use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\PhpSpecOps\Core\Model\Body\Human\HumanBody;
use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\AbstractCharacter;

abstract class AbstractHuman extends AbstractCharacter implements HumanInterface
{
    /** @var SpecificationCollectionInterface */
    protected $inventory;

    public function __construct(string $name, BrainInterface $brain, ?Uuid $id = null)
    {
        parent::__construct($name, $brain, HumanBody::create(), $id);
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
}