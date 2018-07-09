<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:16
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects;

use Weedus\PhpSpecOps\Core\Model\Area\Range;

abstract class AbstractEffect implements EffectInterface
{
    /** @var int|null */
    protected $preparationTime;
    /** @var int|null */
    protected $duration;
    /** @var Range */
    protected $range;

    /**
     * AbstractEffect constructor.
     *
     * @param int|null $preparationTime
     * @param int|null $duration
     * @param Range    $range
     */
    public function __construct(?int $preparationTime, ?int $duration, Range $range)
    {
        $this->preparationTime = $preparationTime;
        $this->duration = $duration;
        $this->range = $range;
    }

    /**
     * @return int
     */
    public function getPreparationTime(): int
    {
        return $this->preparationTime;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return $this->range;
    }
}