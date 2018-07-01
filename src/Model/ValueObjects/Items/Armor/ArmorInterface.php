<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 02:48
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor;

use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\ItemInterface;

interface ArmorInterface extends ItemInterface
{
    public function getArmorType(): ArmorType;

    public function equalsArmorType(ArmorInterface $item): bool;

    public function getDefense(): int;
}