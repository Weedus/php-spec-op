<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:11
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support;

use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemInterface;

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
     * @return string
     */
    public function getText(): string;

    /**
     * @return Range
     */
    public function getRange(): Range;
}