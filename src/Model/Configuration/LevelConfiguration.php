<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:57
 */

namespace Weedus\PhpSpecOps\Core\Model\Configuration;


use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;

class LevelConfiguration implements ConfigurationInterface
{
    /** @var string */
    private $id;
    /** @var int */
    private $height;
    /** @var int */
    private $length;
    /** @var int */
    private $width;
    /** @var array */
    private $fields;

    /**
     * LevelConfiguration constructor.
     * @param string $id
     * @param int $length
     * @param int $width
     * @param int $height
     * @param array $fields
     */
    public function __construct(string $id, int $length, int $width, int $height, array $fields)
    {
        Assertion::allInteger([$length, $width, $height]);
        Assertion::allIsInstanceOf($fields, FieldConfiguration::class);

        $this->id = $id;
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
        $this->fields = $fields;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }


    public function getId()
    {
        return $this->id;
    }

    public function equals(Equalizeable $item): bool
    {
        if (!($item instanceof LevelConfiguration)) {
            return false;
        }

        $equalFields = count(array_filter($this->fields, function (FieldConfiguration $fieldConfig) use ($item) {
                $found = array_filter($item->fields, function (FieldConfiguration $config) use ($fieldConfig) {
                    return $fieldConfig->equals($config);
                });
                return count($found) === 1;
            })) === count($this->fields);


        return $this->id === $item->id
            && $this->length === $item->length
            && $this->width === $item->width
            && $this->height === $item->height
            && $equalFields;
    }
}