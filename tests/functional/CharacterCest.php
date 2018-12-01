<?php

namespace Weedus\PhpSpecOps\Core\Tests\functional;

use Webmozart\Assert\Assert;
use Weedus\Exceptions\NotYetImplementedException;
use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans\Human;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\FinalAction;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestBody;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestBrain;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestCharacter;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestHumanBody;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestInventory;

class CharacterCest
{
    protected $characterConfig = [
        [
            'name' => 'heinz',
            'max_health' => 10,
            'power' => 10,
            'brain' => [
                'action' => [
                    'name' => FinalAction::MOVE,
                    'direction' => Direction::NORTH
                ]
            ],
            'body' => 'human_body',
            'sight' => Range::MEDIUM
        ],
        [
            'name' => 'hubert',
            'max_health' => 10,
            'power' => 10,
            'brain' => [
                'action' => [
                    'name' => FinalAction::MOVE,
                    'direction' => Direction::NORTH
                ]
            ],
            'body' => 'human_body',
            'sight' => Range::MEDIUM
        ]
    ];
    /** @var Human[] */
    protected $character;

    /**
     * @param \FunctionalTester $I
     */
    public function _before(\FunctionalTester $I)
    {
        foreach ($this->characterConfig as $key => $characterConfig) {
            $this->character[$key] = $I->createCharacter($characterConfig);
            Assert::isInstanceOf($this->character[$key], TestCharacter::class);
        }
    }

    public function _after(\FunctionalTester $I)
    {
    }

    public function testGetter(\FunctionalTester $I)
    {
        foreach($this->characterConfig as $key => $config){
            $character = $this->character[$key];
            Assert::eq($character->getMaxHealth(), $config['max_health']);
            Assert::eq($character->getHealth(), $character->getMaxHealth());
            Assert::eq($character->getName(), $config['name']);
            Assert::eq($character->getPower(), $config['power']);
            $sight = $character->getSight();
            Assert::isInstanceOf($sight, Range::class);
            Assert::eq($sight->getValue(),$config['sight']);
            Assert::isInstanceOf(
                $character->getBody(),
                ($config['body'] === 'human_body' ? TestHumanBody::class : TestBody::class)
            );
            Assert::isInstanceOf($character->getBrain(), TestBrain::class);
        }
    }

    public function healthOperations(\FunctionalTester $I)
    {
        $char = $this->character[0];
        $max = $this->characterConfig[0]['max_health'];
        $min = 0;

        Assert::false($char->isDead());

        $char->subHealth($max/2);
        Assert::eq($max/2,$char->getHealth());
        Assert::eq($max,$char->getMaxHealth());
        Assert::false($char->isDead());

        $char->subHealth($max);
        Assert::eq($min,$char->getHealth());
        Assert::eq($max,$char->getMaxHealth());
        Assert::true($char->isDead());

        $char->addHealth($max/2);
        Assert::eq($max/2,$char->getHealth());
        Assert::eq($max,$char->getMaxHealth());
        Assert::false($char->isDead());

        $char->addHealth($max);
        Assert::eq($max,$char->getHealth());
        Assert::eq($max,$char->getMaxHealth());
        Assert::false($char->isDead());
    }

    // tests
    public function tryToTest(\FunctionalTester $I)
    {
        throw new NotYetImplementedException(__METHOD__);
    }
}
