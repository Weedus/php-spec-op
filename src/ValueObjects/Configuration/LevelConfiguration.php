<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:57
 */

namespace PhpSpecOps\ValueObjects\Configuration;


use Assert\Assertion;
use PhpSpecOps\ValueObjects\Equalizeable;

class LevelConfiguration implements ConfigurationInterface
{
    /** @var string */
    private $id;
    /** @var int  */
    private $height;
    /** @var int  */
    private $length;
    /** @var int  */
    private $width;
    /** @var array */
    private $fields;
    /** @var array */
    private $heightsToFill;
    /**
     * LevelConfiguration constructor.
     * @param $height
     * @param $length
     * @param $width
     * @param $units
     * @param $placeables
     */
    public function __construct(string $id, int $length, int $width, int $height, array $fields, ?array $heightsToFill)
    {
        Assertion::allInteger([$length,$width,$height]);
        if($heightsToFill !== null){
            Assertion::allInteger($heightsToFill);
        }
        Assertion::allIsInstanceOf($fields, FieldConfiguration::class);

        $this->id = $id;
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
        $this->fields = $fields;
        $this->heightsToFill = $heightsToFill;
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

    /**
     * @return array
     */
    public function getHeightsToFill(): array
    {
        return $this->heightsToFill;
    }


    public function getId()
    {
        return $this->id;
    }

    /** @return array */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'fields' => $this->fields,
            'heights_to_fill' => $this->heightsToFill
        ];
    }

    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof LevelConfiguration)){
            return false;
        }

        $equalFields = count(array_filter($this->fields, function(FieldConfiguration $fieldConfig)use($item){
            $found = array_filter($item->fields,function(FieldConfiguration $config)use($fieldConfig){
                return $fieldConfig->equals($config);
            });
            return count($found) === 1;
        })) === count($this->fields);

        $equalHeightsToFill = count(array_filter($this->heightsToFill,function(int $height)use($item){
            return in_array($height,$item->heightsToFill);
        })) === count($this->heightsToFill);

        return $this->id === $item->id
            && $this->length === $item->length
            && $this->width === $item->width
            && $this->height === $item->height
            && $equalFields
            && $equalHeightsToFill;
    }
}