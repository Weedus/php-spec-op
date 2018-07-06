<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.07.18
 * Time: 21:58
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities;


use Ramsey\Uuid\Uuid;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;

interface EntityInterface extends Equalizeable
{
    public function getId(): Uuid;
    public function getName(): string;
}