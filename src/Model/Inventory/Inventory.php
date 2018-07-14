<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12.07.18
 * Time: 21:52
 */

namespace Weedus\PhpSpecOps\Core\Model\Inventory;


use Weedus\Collection\SpecificationCollection;
use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\Exceptions\NotAllowedException;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemInterface;

class Inventory implements InventoryInterface
{
    /** @var SpecificationCollectionInterface */
    protected $storage;

    /**
     * Inventory constructor.
     *
     * @param SpecificationCollectionInterface $storage
     */
    public function __construct(SpecificationCollectionInterface $storage)
    {
        $storage->setSupportedClasses([SpecificationCollection::class]);
        $this->storage = $storage;
    }

    /**
     * @param ItemInterface $item
     *
     * @return InventoryInterface
     * @throws NotAllowedException
     */
    public function addItem(ItemInterface $item): InventoryInterface
    {
        $name = $item->getName();
        if (!$this->storage->offsetExists($name)) {
            $this->storage->offsetSet($name, $this->buildStack($item));
        }
        /** @var SpecificationCollection $stack */
        $stack = $this->storage->offsetGet($name);
        $offset = $stack->count();
        $stack->offsetSet($offset, $item);
        return $this;
    }

    /**
     * @param string $name
     *
     * @return int
     */
    public function getAmount(string $name): int
    {
        if (!$this->storage->offsetExists($name)) {
            return 0;
        }
        return $this->storage->offsetGet($name)->count();
    }

    /**
     * @param string $name
     *
     * @return ItemInterface
     */
    public function getItem(string $name): ItemInterface
    {
        if (!$this->storage->offsetExists($name)) {
            return null;
        }
        /** @var SpecificationCollectionInterface $stack */
        $stack = $this->storage->offsetGet($name);
        $offset = $stack->count() - 1;
        $item = $stack->offsetGet($offset);
        $stack->offsetUnset($offset);
        if (!$stack->hasItem()) {
            $this->storage->offsetUnset($name);
        }
        return $item;
    }

    public function getList(): array
    {
        $ret = [];
        foreach ($this->storage as $name => $stack) {
            $ret[] = ['name' => $name, 'amount' => $stack->count()];
        }
        return $ret;
    }

    /**
     * @param ItemInterface $item
     *
     * @return SpecificationCollection
     * @throws NotAllowedException
     */
    protected function buildStack(ItemInterface $item): SpecificationCollection
    {
        $stack = new SpecificationCollection();
        $stack->setSupportedClasses([get_class($item)]);
        return $stack;
    }
}