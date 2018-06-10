<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:39
 */

namespace PhpSpecOps\ValueObjects;


interface Arraylizeable
{
    /** @return array */
    public function toArray(): array;
}