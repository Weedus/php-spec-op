<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 27.11.18
 * Time: 23:11
 */

namespace Weedus\PhpSpecOps\Core\Tests\_support\self;


use Webmozart\Assert\Assert;
use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestAction;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestBody;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestBrain;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestCharacter;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestHumanBody;

trait ObjectCreationTrait
{
    public function createCharacter(array $config)
    {
        return new TestCharacter(
            $config['name'],
            $config['max_health'],
            $config['power'],
            $this->createRange($config['sight']),
            $this->createBrain($config['brain']),
            $this->createBody($config['body'])
        );
    }

    public function createBody(string $config)
    {
        $body = $config === 'human_body'
            ? new TestHumanBody()
            : new TestBody();
        return $body;
    }

    public function createBrain(array $config)
    {
        return new TestBrain($this->createAction($config['action']));
    }

    public function createAction(array $config)
    {
        return new TestAction($config['name'], $this->createDirection($config['direction']));
    }

    public function createDirection(string $direction)
    {
        return call_user_func([Direction::class, strtoupper($direction)]);
    }

    public function createRange(int $range)
    {
        $map = [
            0 => 'zero',
            1 => 'low',
            2 => 'medium_low',
            4 => 'medium',
            5 => 'medium_high',
            6 => 'high',
        ];
        Assert::keyExists($map, $range);
        return call_user_func([Range::class, strtoupper($map[$range])]);

    }
}