<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:34
 */

namespace PhpSpecOps\Container;


use Assert\Assertion;
use PhpSpecOps\ValueObjects\Items\ItemInterface;

class ItemStack
{
    /** @var int */
    protected $maxCount;
    /** @var string */
    protected $itemClass;
    /** @var array */
    protected $stack;

    /**
     * ItemStack constructor.
     * @param int $maxCount
     * @param string $itemClass
     */
    public function __construct(int $maxCount, string $itemClass)
    {
        $this->maxCount = $maxCount;
        $this->itemClass = $itemClass;
    }

    public function getOne()
    {
        Assertion::greaterThan(count($this->stack), 0);
        return array_pop($this->stack);
    }

    public function addOne(ItemInterface $item)
    {
        Assertion::isInstanceOf($item, $this->itemClass);
        Assertion::lessThan(count($this->stack), $this->maxCount);
        array_push($this->stack, $item);
    }

    public function count()
    {
        return count($this->stack);
    }

    public function maxCount()
    {
        return count($this->stack);
    }

    public static function create(int $maxCount, string $itemClass)
    {
        return new static($maxCount, $itemClass);
    }
}
