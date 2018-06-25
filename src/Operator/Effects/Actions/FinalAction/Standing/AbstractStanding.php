<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 15:17
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Actions\FinalAction\Standing;


use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\Units\Places\Walks\WalksInterface;
use Weedus\PhpSpecOps\Operator\Effects\AbstractEffect;

abstract class AbstractStanding extends AbstractEffect
{
    abstract protected function performEffect(Field $caster, ?Field $target = null);

    /**
     * @param Field $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        $this->performStandOnEffect($caster);
        $this->performEffect($caster, $target);
    }

    protected function performStandOnEffect(Field $field)
    {
        $place = $field->getPlace();
        /** @var WalksInterface $place */
        if($place->hasStandOnEffect()){
            $place->getStandOnEffect()->perform($field);
        }
    }
}