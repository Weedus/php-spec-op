<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:36
 */

namespace PhpSpecOps\ValueObjects\CharacterWrapper;


use PhpSpecOps\Container\CollectionInterface;

interface AbstractHumanWrapperInterface extends AbstractCharacterWrapperInterface
{
    public function getInventory(): CollectionInterface;
}