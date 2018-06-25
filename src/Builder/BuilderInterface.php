<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:54
 */

namespace Weedus\PhpSpecOps\Builder;

use Weedus\PhpSpecOps\Model\Configuration\ConfigurationInterface;

interface BuilderInterface
{
    public static function get(ConfigurationInterface $configuration);
}