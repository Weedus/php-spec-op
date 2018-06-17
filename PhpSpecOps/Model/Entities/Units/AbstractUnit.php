<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:25
 */

namespace Weedus\PhpSpecOps\Model\Entities\Units;


use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\Entities\AbstractEntity;

abstract class AbstractUnit extends AbstractEntity implements UnitInterface
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

    public function toArray(): array
    {
        return [
                'field' => $this->field->toArray()
            ] + parent::toArray();
    }

    public function unsetField()
    {
        $this->field = null;
    }
}