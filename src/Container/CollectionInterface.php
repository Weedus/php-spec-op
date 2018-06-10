<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:23
 */

namespace PhpSpecOps\Container;


interface CollectionInterface extends \ArrayAccess, \IteratorAggregate
{
    public static function fromArray(array $array);

    public function hasItem();

    public function unsetAll();

    public function count();

    public function getMaxCount();

    public function hasMaxCount();

    public function setMaxCount($maxCount);

    public function setRestrictedKeys(array $keys);

    public function setSupportedClass($class);

    public function getKeys();
}