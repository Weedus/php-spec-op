<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 24.06.18
 * Time: 19:18
 */

namespace Weedus\PhpSpecOps\Tests\Helper;

use Weedus\PhpSpecOps\Model\ValueObjects\Items\Support\AbstractSupportItem;
use Weedus\PhpSpecOps\Operator\Effects\EffectInterface;

class TestSupportItem extends AbstractSupportItem
{
    /**
     * @return EffectInterface
     */
    public function getEffect(): EffectInterface
    {
        return $this->effect;
    }

}