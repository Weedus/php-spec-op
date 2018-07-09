<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 15:17
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Actions\FinalAction\Standing;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\Walks\WalksInterface;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

abstract class AbstractStanding extends AbstractEffect
{
    abstract protected function performEffect(Field $caster, ?Field $target = null);

    /**
     * @param Field      $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        $this->performStandOnEffect($caster);
        $this->performEffect($caster, $target);
    }

    /**
     * @param Field $field
     *
     * TODO WTF? what should this be? may cause loop i think!!
     */
    protected function performStandOnEffect(Field $field)
    {
        $place = $field->getPlace();
        /** @var WalksInterface $place */
        if ($place->hasStandOnEffect()) {
            $place->getStandOnEffect()->perform($field);
        }
    }
}