<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:34
 */

namespace Weedus\PhpSpecOps\Model\Body;

use Weedus\PhpSpecOps\Model\Equalizeable;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorChestInterface;

class Body implements BodyInterface
{

    /** @var ArmorChestInterface */
    protected $chest;


    public function getChest(): ArmorChestInterface
    {
        return $this->chest;
    }

    /**
     * @param ArmorChestInterface $chest
     */
    public function setChest(ArmorChestInterface $chest): void
    {
        $this->chest = $chest;
    }


    public function equals(Equalizeable $item): bool
    {
        if (!($item instanceof BodyInterface)) {
            return false;
        }
        return $this->chest->equals($item->getChest());
    }
}