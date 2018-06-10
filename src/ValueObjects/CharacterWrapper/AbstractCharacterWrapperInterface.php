<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:34
 */

namespace PhpSpecOps\ValueObjects\CharacterWrapper;


use PhpSpecOps\ValueObjects\Body\BodyInterface;
use PhpSpecOps\ValueObjects\Range;

interface AbstractCharacterWrapperInterface
{
    public function getMaxHealth(): int;

    public function getHealth(): int;

    public function getPower(): int;

    public function getSight(): Range;

    public function getBody(): BodyInterface;
}