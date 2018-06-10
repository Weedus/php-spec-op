<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 00:38
 */

$fields = [
    new \PhpSpecOps\ValueObjects\Configuration\FieldConfiguration(
        0,0,0,
        null,
        \PhpSpecOps\Model\Entities\Units\Characters\Humans\SpecOp::class
    ),
    new \PhpSpecOps\ValueObjects\Configuration\FieldConfiguration(
        5,5,0,
        \PhpSpecOps\Model\Entities\Units\Placeables\Walkables\ExitPoint::class
    )
];
$heightToFill = [0];

return new \PhpSpecOps\ValueObjects\Configuration\LevelConfiguration(
    'level1',
    5,5,1,
    $fields, $heightToFill
);
