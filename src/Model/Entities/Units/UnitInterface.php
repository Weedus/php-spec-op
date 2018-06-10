<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:56
 */

namespace PhpSpecOps\Model\Entities\Units;


use PhpSpecOps\Model\Area\Field;
use PhpSpecOps\Model\Entities\EntityInterface;

interface UnitInterface extends EntityInterface
{
    public function getField(): Field;

    public function setField(Field $field);

    public function unsetField();
}