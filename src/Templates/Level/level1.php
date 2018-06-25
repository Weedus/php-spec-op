<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 00:38
 */

$fields = [
    new \Weedus\PhpSpecOps\Model\ValueObjects\Configuration\FieldConfiguration(
        0,0,0,
        null,
        \Weedus\PhpSpecOps\Model\Entities\Units\Characters\Humans\SpecOp::class
    ),
    new \Weedus\PhpSpecOps\Model\ValueObjects\Configuration\FieldConfiguration(
        5,5,0,
        \Weedus\PhpSpecOps\Model\Entities\Units\Placeables\Walkables\ExitPoint::class
    )
];
$heightToFill = [0];

return new \Weedus\PhpSpecOps\Model\ValueObjects\Configuration\LevelConfiguration(
    'level1',
    5,5,1,
    $fields, $heightToFill
);


$configurator = new LevelConfigurator();