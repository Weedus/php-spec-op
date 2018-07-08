<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:54
 */

namespace Weedus\PhpSpecOps\Core\Builder;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Area\Map;
use Weedus\PhpSpecOps\Core\Model\Configuration\ConfigurationInterface;
use Weedus\PhpSpecOps\Core\Model\Configuration\FieldConfiguration;
use Weedus\PhpSpecOps\Core\Model\Configuration\LevelConfiguration;

abstract class MapBuilder implements BuilderInterface
{
    /**
     * @param ConfigurationInterface $configuration
     *
     * @return bool|Map
     * @throws \Assert\AssertionFailedException
     */
    public static function get(ConfigurationInterface $configuration)
    {
        if ($configuration instanceof LevelConfiguration) {
            return self::getByLevelConfig($configuration);
        }
        return false;
    }

    /**
     * @param LevelConfiguration $configuration
     *
     * @return Map
     * @throws \Assert\AssertionFailedException
     */
    private static function getByLevelConfig(LevelConfiguration $configuration)
    {
        $map = new Map($configuration->getLength(), $configuration->getWidth(), $configuration->getHeight());
        $fields = array_map(function (FieldConfiguration $config) {
            return FieldBuilder::get($config);
        }, $configuration->getFields());
        /** @var Field $field */
        foreach ($fields as $field) {
            $field->setMap($map);
            $map->addField($field);
        }
        self::fillHeightsWithDefault($map, $configuration->getHeightsToFill());

        return $map;
    }

    /**
     * @param Map   $map
     * @param array $getHeightsToFill
     *
     * @throws \Assert\AssertionFailedException
     */
    private static function fillHeightsWithDefault(Map $map, array $getHeightsToFill)
    {
        foreach ($getHeightsToFill as $z) {
            for ($x = 0; $x < $map->getLength(); $x++) {
                for ($y = 0; $y < $map->getLength(); $y++) {
                    if (!$map->hasField(Location::create($x, $y, $z))) {
                        $map->addField(self::getDefaultField($x, $y, $z));
                    }
                }
            }
        }
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $z
     *
     * @return bool|Field
     * @throws \Assert\AssertionFailedException
     */
    private static function getDefaultField(int $x, int $y, int $z)
    {
        return FieldBuilder::get(new FieldConfiguration($x, $y, $z));
    }
}