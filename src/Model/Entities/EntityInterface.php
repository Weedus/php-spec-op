<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:12
 */

namespace Weedus\PhpSpecOps\Model\Entities;

use PascalDeVink\ShortUuid\ShortUuid;

interface EntityInterface
{
    /**
     * @return ShortUuid
     */
    public function getId(): ShortUuid;

    /**
     * @return string
     */
    public function getName(): string;
}