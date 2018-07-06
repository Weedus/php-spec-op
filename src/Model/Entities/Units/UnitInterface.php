<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:56
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Entities\EntityInterface;

interface UnitInterface extends EntityInterface
{
    public function getField(): Field;

    public function setField(Field $field);

    public function unsetField();
}