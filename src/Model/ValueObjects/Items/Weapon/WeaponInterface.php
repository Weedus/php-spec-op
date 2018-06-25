<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:08
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon;


use Weedus\PhpSpecOps\Model\Area\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\ItemInterface;

interface WeaponInterface extends ItemInterface
{
    /**
     * @return int
     */
    public function getPower(): int;

    /**
     * @return int
     */
    public function getDefense(): int;

    /**
     * @return Range
     */
    public function getMinRange(): Range;

    /**
     * @return Range
     */
    public function getMaxRange(): Range;
}