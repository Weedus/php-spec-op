<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 10.07.18
 * Time: 00:00
 */

namespace Weedus\PhpSpecOps\Core\Model\Inventory;


use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemInterface;

interface InventoryInterface
{
    public function addItem(ItemInterface $item): InventoryInterface;
    public function getItem(string $name): ItemInterface;
    public function getAmount(string $name): int;
    public function getList(): array;
}