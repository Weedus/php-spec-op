<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:36
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\CharacterWrapper;


use Weedus\PhpSpecOps\Model\Storage\CollectionInterface;

interface AbstractHumanWrapperInterface extends AbstractCharacterWrapperInterface
{
    public function getInventory(): CollectionInterface;
}