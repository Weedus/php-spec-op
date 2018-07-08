<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:11
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support;

use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\ActionInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\UtilityInterface;

interface SupportItemInterface extends ItemInterface, UtilityInterface
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
     * @param null|Direction $direction
     *
     * @return ActionInterface[]
     */
    public function getActions(?Direction $direction = null): array;

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return Range
     */
    public function getRange(): Range;
}