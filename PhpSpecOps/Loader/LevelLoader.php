<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 22:29
 */

namespace Weedus\PhpSpecOps\Loader;


use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\Configuration\LevelConfiguration;

class LevelLoader
{
    private $path = '/../../Templates/Level/';

    /**
     * @param $levelName
     * @return mixed
     * @throws \Assert\AssertionFailedException
     */
    public function get($levelName)
    {
        $path = $this->path . $levelName . '.php';
        Assertion::file($path);
        $config = require $path;
        Assertion::isInstanceOf($config,LevelConfiguration::class);
        return $config;
    }

    public function getLevelNames()
    {
        $files = array_filter(scandir($this->path), function ($value) {
            return !in_array($value, ['.', '..']);
        });
        return array_map(function ($value) {
            return str_replace('.php', '', $value);
        }, $files);
    }
}