<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 22:29
 */

namespace PhpSpecOps\Operator\Builder;


use Assert\Assertion;
use PhpSpecOps\Operator\Level\Level;
use PhpSpecOps\ValueObjects\Configuration\ConfigurationInterface;
use PhpSpecOps\ValueObjects\Configuration\LevelConfiguration;

abstract class LevelBuilder implements BuilderInterfacer
{
    /**
     * @param ConfigurationInterface $configuration
     * @return Level
     * @throws \Assert\AssertionFailedException
     */
    public static function get(ConfigurationInterface $configuration)
    {
        Assertion::isInstanceOf($configuration,LevelConfiguration::class);
        /** @var LevelConfiguration $configuration */
        $map = MapBuilder::get($configuration);
        return new Level($configuration->getId(),$map);
    }

}