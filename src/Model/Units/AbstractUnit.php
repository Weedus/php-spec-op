<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:25
 */

namespace Weedus\PhpSpecOps\Model\Units;


use Weedus\PhpSpecOps\Model\Area\Field;

abstract class AbstractUnit implements UnitInterface
{
    /** @var Field */
    protected $field;

    public function setField(Field $field)
    {
        $this->field = $field;
        return $this;
    }

    public function getField(): Field
    {
        return $this->field;
    }

    public function unsetField()
    {
        $this->field = null;
    }
}