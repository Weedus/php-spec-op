<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:12
 */

namespace PhpSpecOps\Model\Entities;

use PascalDeVink\ShortUuid\ShortUuid;
use PhpSpecOps\Model\ValueObjects\Arraylizeable;

interface EntityInterface extends Arraylizeable
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