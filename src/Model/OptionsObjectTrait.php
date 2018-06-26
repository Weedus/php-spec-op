<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 19:55
 */

namespace Weedus\PhpSpecOps\Model;


trait OptionsObjectTrait
{
    private $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param $name
     * @param $arguments
     * @return OptionsObjectTrait
     */
    public static function __callStatic($name, $arguments): self
    {
        return self::create($name);
    }

    /**
     * @param $name
     * @return OptionsObjectTrait
     */
    public static function create($name): self
    {
        return new self(constant('self::' . strtoupper($name)));
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Equalizeable $item
     * @return bool
     */
    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof $this)){
            return false;
        }
        /** @var OptionsObjectTrait $item */
        return $this->value === $item->value;
    }
}