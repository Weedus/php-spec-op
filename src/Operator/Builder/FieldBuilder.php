<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 08.06.18
 * Time: 21:48
 */

namespace PhpSpecOps\Operator\Builder;


use Assert\Assertion;
use PhpSpecOps\Model\Area\Field;
use PhpSpecOps\Model\Area\Location;
use PhpSpecOps\ValueObjects\Configuration\ConfigurationInterface;
use PhpSpecOps\ValueObjects\Configuration\FieldConfiguration;

abstract class FieldBuilder implements BuilderInterfacer
{
    /**
     * @param ConfigurationInterface $configuration
     * @return bool|Field
     * @throws \Assert\AssertionFailedException
     */
    public static function get(ConfigurationInterface $configuration)
    {
        Assertion::isInstanceOf($configuration, FieldConfiguration::class);
        /** @var FieldConfiguration $configuration */
        $location = new Location(
            $configuration->getX(),
            $configuration->getY(),
            $configuration->getZ()
        );

        $placeable = new ($configuration->getPlaceable());

        $character = new ($configuration->getCharacter());

        return new Field($location,$placeable, $character);
    }
}