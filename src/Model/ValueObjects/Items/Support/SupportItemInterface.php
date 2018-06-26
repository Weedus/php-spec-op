<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:11
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Support;

use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\Area\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemInterface;

interface SupportItemInterface extends ItemInterface
{
    /**
     * @return SupportItemType
     */
    public function getSupportItemType(): SupportItemType;

    /**
     * @return bool
     */
    public function equalsSupportItemType(SupportItemInterface $item): bool;

    /**
     * @param Field $caster
     * @param Field $target
     */
    public function perform(Field $caster, Field $target): void;

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