<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 00:38
 */

$fields = [
    new \Weedus\PhpSpecOps\Core\Model\Configuration\FieldConfiguration(
        0, 0, 0,
        null,
        \Weedus\PhpSpecOps\Core\Model\Units\Characters\Humans\SpecOp::class
    ),
    new \Weedus\PhpSpecOps\Core\Model\Configuration\FieldConfiguration(
        5, 5, 0,
        \Weedus\PhpSpecOps\Core\Model\Units\Placeables\Walkables\ExitPoint::class
    )
];
$heightToFill = [0];

return new \Weedus\PhpSpecOps\Core\Model\Configuration\LevelConfiguration(
    'level1',
    5, 5, 1,
    $fields, $heightToFill
);


$configurator = new LevelConfigurator();