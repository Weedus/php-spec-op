<?php

namespace Weedus\PhpSpecOps\Core\Tests\unit;


use Weedus\PhpSpecOps\Core\Model\Area\Direction;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\AbstractAction;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\Action;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\ActionInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Actions\FinalAction;
use Weedus\PhpSpecOps\Core\Tests\Helper\TestAction;

class ActionTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMethods()
    {
        $action1 = new TestAction('test');
        $action2 = new TestAction('test', Direction::WEST());

        $compare1 = new TestAction('an_other_test');
        $compare2 = new TestAction('test', Direction::NORTH());
        $compare3 = new TestAction('an_other_test', Direction::WEST());
        $compare4 = new TestAction('an_other_test', Direction::NORTH());

        $this->assertInstanceOf(ActionInterface::class, $action1);
        $this->assertInstanceOf(ActionInterface::class, $action2);
        $this->assertInstanceOf(AbstractAction::class, $action1);
        $this->assertInstanceOf(AbstractAction::class, $action2);
        $this->assertEquals('test', $action1->getAction());
        $this->assertEquals('test', $action2->getAction());
        $this->assertNull($action1->getDirection());
        $this->assertInstanceOf(Direction::class, $action2->getDirection());
        $this->assertEquals(Direction::WEST, $action2->getDirection()->getValue());
        $this->assertTrue($action1->equals($action1));
        $this->assertTrue($action2->equals($action2));
        $this->assertFalse($action1->equals($action2));
        $this->assertFalse($action2->equals($action1));

        $this->assertFalse($action1->equals($compare1));
        $this->assertFalse($action1->equals($compare2));
        $this->assertFalse($action1->equals($compare3));
        $this->assertFalse($action1->equals($compare4));

        $this->assertFalse($action2->equals($compare1));
        $this->assertFalse($action2->equals($compare2));
        $this->assertFalse($action2->equals($compare3));
        $this->assertFalse($action2->equals($compare4));

    }

    public function testAction()
    {
        $this->assertInstanceOf(ActionInterface::class, Action::HEAR());
        $this->assertInstanceOf(AbstractAction::class, Action::HEAR());

        $this->assertEquals('activate', Action::ACTIVATE(Direction::WEST())->getAction());
        $this->assertEquals('deactivate', Action::DEACTIVATE(Direction::WEST())->getAction());
        $this->assertEquals('close', Action::CLOSE(Direction::WEST())->getAction());
        $this->assertEquals('open', Action::OPEN(Direction::WEST())->getAction());
        $this->assertEquals('put', Action::PUT(Direction::WEST())->getAction());
        $this->assertEquals('grab', Action::GRAB(Direction::WEST())->getAction());
        $this->assertEquals('look', Action::LOOK(Direction::WEST())->getAction());
        $this->assertEquals('feel', Action::FEEL(Direction::WEST())->getAction());
        $this->assertEquals('smell', Action::SMELL(Direction::WEST())->getAction());
        $this->assertEquals('taste', Action::TASTE(Direction::WEST())->getAction());
        $this->assertEquals('hear', Action::HEAR(Direction::WEST())->getAction());

    }

    public function testFinalAction()
    {
        $this->assertInstanceOf(ActionInterface::class, FinalAction::REST());
        $this->assertInstanceOf(AbstractAction::class, FinalAction::REST());

        $this->assertEquals('move', FinalAction::MOVE(Direction::WEST())->getAction());
        $this->assertEquals('attack', FinalAction::ATTACK(Direction::WEST())->getAction());
        $this->assertEquals('rest', FinalAction::REST()->getAction());
        $this->assertEquals('prepare', FinalAction::PREPARE()->getAction());
        $this->assertEquals('perform', FinalAction::PERFORM()->getAction());
    }
}