<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 08.06.18
 * Time: 21:48
 */

namespace Weedus\PhpSpecOps\Core\Builder;


use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Configuration\ConfigurationInterface;
use Weedus\PhpSpecOps\Core\Model\Configuration\FieldConfiguration;

abstract class FieldBuilder implements BuilderInterface
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

        $placeable = new ($configuration->getPlace());

        $character = new ($configuration->getCharacter());

        return new Field($location, $placeable, $character);
    }
}