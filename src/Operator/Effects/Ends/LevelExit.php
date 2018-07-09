<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:12
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Ends;


use Weedus\Exceptions\NotYetImplementedException;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

class LevelExit extends AbstractEffect
{
    public function __construct()
    {
        parent::__construct(0, 0, Range::ZERO());
    }

    /**
     * @param Field      $caster
     * @param null|Field $target
     *
     * @throws NotYetImplementedException
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        throw new NotYetImplementedException(__CLASS__ . '->' . __METHOD__);
    }
}