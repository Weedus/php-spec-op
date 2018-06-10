<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:22
 */

namespace PhpSpecOps\Model\Storage;


use Assert\Assertion;

class Collection implements CollectionInterface
{
    /** @var int */
    protected $maxCount;
    /** @var array */
    protected $restrictedKeys;
    /** @var string */
    protected $supportedClass;
    /** @var array */
    protected $items;

    /**
     * Collection constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws \Assert\AssertionFailedException
     */
    public function offsetSet($offset, $value)
    {
        self::validateOffset($offset);
        self::validateValue($value);
        $this->items[$offset] = $value;
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        self::validateOffset($offset);
        return $this->items[$offset];
    }

    /**
     * @param array $array
     * @return Collection
     * @throws \Assert\AssertionFailedException
     */
    public static function fromArray(array $array)
    {
        $res = new self();
        foreach ($array as $offset => $value) {
            $res->validateOffset($offset);
            $res->validateValue($value);
        }
        $res->items = $array;
        return $res;
    }

    /**
     * @param $offset
     */
    protected function validateOffset($offset)
    {
        if (!empty($this->restrictedKeys)) {
            Assertion::inArray($offset, $this->restrictedKeys, 'offset not in enum [' . implode(',', $this->restrictedKeys) . ']');
        }
    }

    /**
     * @param $value
     * @throws \Assert\AssertionFailedException
     */
    protected function validateValue($value)
    {
        if (!empty($this->supportedClass)) {
            Assertion::isInstanceOf($value, $this->supportedClass, 'must be instance of ' . $this->supportedClass);
        }
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return key_exists($offset, $this->items);
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }


    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return (function () {
            foreach ($this->items as $key => $value) {
                yield $key => $value;
            }
        })();
    }

    public function hasItem()
    {
        return !empty($this->items);
    }

    public function unsetAll()
    {
        $this->items = [];
    }

    public function count()
    {
        return count($this->items);
    }


    public function getMaxCount()
    {
        if ($this->hasMaxCount()) {
            return $this->maxCount;
        }
        return null;
    }

    public function hasMaxCount()
    {
        return isset($this->maxCount);
    }

    /**
     * @param $maxCount
     * @throws \Assert\AssertionFailedException
     */
    public function setMaxCount($maxCount)
    {
        Assertion::integer($maxCount);
        $this->maxCount = $maxCount;
    }

    /**
     * @param array $restrictedKeys
     */
    public function setRestrictedKeys(array $restrictedKeys)
    {
        $this->restrictedKeys = $restrictedKeys;
    }

    /**
     * @param $supportedClass
     * @throws \Assert\AssertionFailedException
     */
    public function setSupportedClass($supportedClass)
    {
        Assertion::string($supportedClass);
        Assertion::classExists($supportedClass);
        $this->supportedClass = $supportedClass;
    }


    public function getKeys()
    {
        return array_keys($this->items);
    }
}