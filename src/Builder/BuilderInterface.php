<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.06.18
 * Time: 23:54
 */

namespace Weedus\PhpSpecOps\Core\Builder;

use Weedus\PhpSpecOps\Core\Model\Configuration\ConfigurationInterface;

interface BuilderInterface
{
    public static function get(ConfigurationInterface $configuration);
}