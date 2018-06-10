<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:11
 */

namespace PhpSpecOps\ValueObjects\Items\Support;

use PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use PhpSpecOps\Model\ValueObjects\Range;
use PhpSpecOps\ValueObjects\Items\ItemInterface;

interface SupportItemInterface extends ItemInterface
{
    /**
     * @param CharacterEffectInterface $caster
     * @param CharacterEffectInterface $target
     */
    public function perform(CharacterEffectInterface $caster, CharacterEffectInterface $target): void;

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return Range
     */
    public function getRange(): Range;

    /**
     * @return int
     */
    public function getPreparationTime(): int;

    /**
     * @return int
     */
    public function getDuration(): int;
}