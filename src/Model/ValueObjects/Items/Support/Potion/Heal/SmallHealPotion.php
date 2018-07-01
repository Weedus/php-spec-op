<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:38
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support\Potion\Heal;

class SmallHealPotion extends AbstractHealPotion
{
    protected function getInitName(): string
    {
        return 'SmallHealPotion';
    }

    protected function getInitHealAmount(): int
    {
        return 5;
    }
}