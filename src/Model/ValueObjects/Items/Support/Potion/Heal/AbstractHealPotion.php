<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:52
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support\Potion\Heal;


use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Support\AbstractSupportItem;
use Weedus\PhpSpecOps\Core\Operator\Effects\Health\Heal;

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