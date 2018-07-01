<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 24.06.18
 * Time: 19:18
 */

namespace Weedus\PhpSpecOps\Core\Tests\Helper;

use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support\AbstractSupportItem;
use Weedus\PhpSpecOps\Core\Operator\Effects\EffectInterface;

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