<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 06.07.18
 * Time: 22:09
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects;


interface UtilityInterface
{
    /**
     * @return int|null
     */
    public function getPreparationTime(): ?int;

    /**
     * @return int|null
     */
    public function getDuration(): ?int;

    /**
     * @return int|null
     */
    public function getUtilizations(): ?int;
}