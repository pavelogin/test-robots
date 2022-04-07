<?php
namespace Robots;
use Robots\RobotInterface;
use Robots\Robot;

class Robot2 extends Robot
{
    public function __construct()
    {
        self::_setter($this->getType(), 20, 100);
    }

    public function getType()
    {
        return get_class();
    }
}