<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 22:35
 */

namespace Weedus\PhpSpecOps\Operator\Level;



use Weedus\PhpSpecOps\Model\Area\Map;
use Weedus\PhpSpecOps\Model\Units\Characters\CharacterInterface;

final class Level
{
    const EXIT_POINT = 'exit';
    const DEAD = 'dead';

    public static $levelEnd = null;

    private $id;
    /** @var Map */
    private $map;
    /** @var Player */
    private $player;

    /**
     * Level constructor.
     * @param $id
     * @param Map $map
     */
    public function __construct($id, Map $map)
    {
        $this->id = $id;
        $this->map = $map;
    }

    /**
     * @param Player $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }



    private function performNextStep()
    {
        $specOp = null;
        $others = [];
        /** @var CharacterInterface $char */
        foreach($this->map->getCharacters() as $char){
            if($char->getName() === 'SpecOp'){
                $specOp = $char;
                continue;
            }
            $others[] = $char;
        }
        $this->performPlayerStep($specOp);
        /** @var CharacterInterface $char */
        foreach($others as $char){
            $char->getBrain()->perform();
        }
    }


}