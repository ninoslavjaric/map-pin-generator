<?php
/**
 * Created by PhpStorm.
 * User: ninoslav.jaric
 * Date: 24-Dec-16
 * Time: 23:48
 */

namespace Logic;


class Navigator
{
    public $srcPath;

    /**
     * Navigator constructor.
     */
    public function __construct()
    {
        $this->srcPath = __DIR__."/..";
    }

    /**
     * @return string
     */
    public function getCirclePatternPath(){
        return "{$this->srcPath}/Resources/patterns/circle.png";
    }

    /**
     * @return string
     */
    public function getPinPatternPath(){
        return "{$this->srcPath}/Resources/patterns/pin.png";
    }
}