<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:56
 */

namespace Weedus\PhpSpecOps\Model\Units;


use Weedus\PhpSpecOps\Model\Area\Field;

interface UnitInterface
{
    public function getField(): Field;

    public function setField(Field $field);

    public function unsetField();
}