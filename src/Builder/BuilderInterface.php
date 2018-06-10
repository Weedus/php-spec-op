<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:54
 */

namespace PhpSpecOps\Builder;

use PhpSpecOps\Model\ValueObjects\Configuration\ConfigurationInterface;

interface BuilderInterface
{
    public static function get(ConfigurationInterface $configuration);
}