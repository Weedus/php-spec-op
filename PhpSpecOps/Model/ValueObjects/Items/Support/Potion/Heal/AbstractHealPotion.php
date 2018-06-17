<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:52
 */

namespace Weedus\PhpSpecOps\ValueObjects\Items\Support\Potion\Heal;

use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Operator\Effects\Health\Heal;
use Weedus\PhpSpecOps\ValueObjects\Items\Support\AbstractSupportItem;

abstract class AbstractHealPotion extends AbstractSupportItem
{
    public function __construct()
    {
        list($name, $text, $effect) = $this->init();
        parent::__construct($name, $text, $effect, Range::MEDIUM(), 0, 0);
    }

    final protected function init()
    {
        return [
            $this->getInitName(),
            'Heals User by ' . $this->getInitHealAmount() . ' HealthPoints.',
            Heal::create($this->getInitHealAmount())
        ];
    }

    abstract protected function getInitName(): string;

    abstract protected function getInitHealAmount(): int;
}