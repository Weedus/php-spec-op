<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:19
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters;


use Ramsey\Uuid\Uuid;
use Weedus\PhpSpecOps\Core\Exceptions\ConstructionFailureException;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\AbstractUnit;

abstract class AbstractCharacter extends AbstractUnit implements CharacterInterface, CharacterEffectInterface
{
    /** @var int */
    protected $maxHealth;
    /** @var int */
    protected $health;

    /** @var int */
    protected $power;
    /** @var Range */
    protected $sight;
    /** @var BodyInterface */
    protected $body;
    /** @var BrainInterface */
    protected $brain;

    /**
     * AbstractCharacter constructor.
     * @param string $name
     * @param null|Uuid $id
     * @throws ConstructionFailureException
     */
    public function __construct(string $name, BrainInterface $brain, BodyInterface $body, ?Uuid $id = null)
    {
        $this->validateConstruct();
        $this->brain = $brain;
        $this->body = $body;
        parent::__construct($name, $id);
    }


    public function addHealth(int $amount)
    {
        $this->health = min([$this->maxHealth, $this->health + $amount]);

    }

    public function subHealth(int $amount)
    {
        $this->health = max([0, $this->health - $amount]);
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function getSight(): Range
    {
        return $this->sight;
    }

    /**
     * @return BodyInterface
     */
    public function getBody(): BodyInterface
    {
        return $this->body;
    }

    /**
     * @return BrainInterface
     */
    public function getBrain(): BrainInterface
    {
        return $this->brain;
    }


    public function isDead(): bool
    {
        return $this->health <= 0;
    }

    /**
     * @throws ConstructionFailureException
     */
    protected function validateConstruct()
    {
        $missing = [];
        if(empty($this->maxHealth)){
            $missing[] = 'maxHealth';
        }
        if(empty($this->power)){
            $missing[] = 'power';
        }
        if(empty($this->sight)){
            $missing[] = 'sight';
        }
        if(!empty($missing)){
            throw new ConstructionFailureException('attributes not set: ['.implode(', ', $missing).']');
        }
    }
}