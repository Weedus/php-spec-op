<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:34
 */

namespace Weedus\PhpSpecOps\Core\Model\Body;

use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Chest\ArmorChestInterface;

class Body implements BodyInterface
{

    /** @var ArmorChestInterface|null */
    protected $chest = null;

    /**
     * @return null|ArmorChestInterface
     */
    public function getChest(): ?ArmorChestInterface
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

    public static function create()
    {
        return new static();
    }
}