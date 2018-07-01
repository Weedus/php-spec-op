<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:19
 */

namespace Weedus\PhpSpecOps\Core\Model\Units\Characters;


use Assert\Assertion;
use PascalDeVink\ShortUuid\ShortUuid;
use Weedus\PhpSpecOps\Core\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Core\Model\Units\AbstractUnit;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Range;

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

    /**
     * AbstractCharacter constructor.
     * @param string $name
     * @param null|ShortUuid $id
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $name, ?ShortUuid $id = null)
    {
        Assertion::notEmpty($this->maxHealth, 'maxHealth empty');
        Assertion::notEmpty($this->power, 'power empty');
        Assertion::notEmpty($this->sight, 'sight empty');
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
     * @param BodyInterface $body
     */
    public function setBody(BodyInterface $body): void
    {
        $this->body = $body;
    }

    public function isDead(): bool
    {
        return $this->health <= 0;
    }
}