<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:30
 */

namespace Weedus\PhpSpecOps\Model\Units\Places\Walks;


use PascalDeVink\ShortUuid\ShortUuid;
use Weedus\PhpSpecOps\Operator\Effects\Ends\LevelExit;

class ExitPoint extends Ground
{
    public function __construct(?ShortUuid $id = null)
    {
        parent::__construct('exit_point', $id);
    }

    public function isExit(): bool
    {
        return true;
    }

}