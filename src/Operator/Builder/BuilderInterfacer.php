<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:54
 */

namespace PhpSpecOps\Operator\Builder;


use PhpSpecOps\ValueObjects\Configuration\ConfigurationInterface;

interface BuilderInterfacer
{
    public static function get(ConfigurationInterface $configuration);
}