<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:23
 */

namespace Weedus\PhpSpecOps\Model\Entities\Units\Characters\Humans;


use PascalDeVink\ShortUuid\ShortUuid;

class Human extends AbstractHuman
{
    public function __construct(?string $name = null, ?ShortUuid $id = null)
    {
        parent::__construct($name??'Human', $id);
    }

}