<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 22:29
 */

namespace Weedus\PhpSpecOps\Builder;

use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\Configuration\ConfigurationInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Configuration\LevelConfiguration;
use Weedus\PhpSpecOps\Operator\Level\Level;

abstract class LevelBuilder implements BuilderInterface
{
    /**
     * @param ConfigurationInterface $configuration
     * @return Level
     * @throws \Assert\AssertionFailedException
     */
    public static function get(ConfigurationInterface $configuration)
    {
        Assertion::isInstanceOf($configuration,LevelConfiguration::class);
        $map = MapBuilder::get($configuration);
        /** @var LevelConfiguration $configuration */
        return new Level($configuration->getId(),$map);
    }

}