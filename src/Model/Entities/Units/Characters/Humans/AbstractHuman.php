<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans;

use Ramsey\Uuid\Uuid;
use Weedus\PhpSpecOps\Core\Model\Body\Human\HumanBody;
use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\AbstractCharacter;
use Weedus\PhpSpecOps\Core\Model\Inventory\InventoryInterface;

abstract class AbstractHuman extends AbstractCharacter implements HumanInterface
{
    /** @var InventoryInterface */
    protected $inventory;

    public function __construct(string $name, BrainInterface $brain, ?Uuid $id = null)
    {
        parent::__construct($name, $brain, HumanBody::create(), $id);
    }

    public function getInventory(): InventoryInterface
    {
        return $this->inventory;
    }

    /**
     * @param InventoryInterface $inventory
     */
    public function setInventory(InventoryInterface $inventory): void
    {
        $this->inventory = $inventory;
    }
}