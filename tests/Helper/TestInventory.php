<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.07.18
 * Time: 23:59
 */

namespace Weedus\PhpSpecOps\Core\Tests\Helper;


use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\PhpSpecOps\Core\Model\Inventory\Inventory;

class TestInventory extends Inventory
{
    public function getStorage(): SpecificationCollectionInterface
    {
        return $this->storage;
    }
}