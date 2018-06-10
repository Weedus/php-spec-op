<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 02:42
 */

namespace PhpSpecOps\Model\ValueObjects\CharacterWrapper;


class AbstractWrapper implements WrapperInterface
{
    private $item;

    /**
     * AbstractWrapper constructor.
     * @param $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }


}