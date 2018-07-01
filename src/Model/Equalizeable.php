<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:36
 */

namespace Weedus\PhpSpecOps\Core\Model;


interface Equalizeable
{
    public function equals(Equalizeable $item): bool;
}