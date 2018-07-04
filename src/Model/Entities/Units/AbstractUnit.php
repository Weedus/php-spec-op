<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:25
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units;


use Weedus\PhpSpecOps\Core\Model\Area\Field;

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