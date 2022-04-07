<?php
namespace Robots;
use Robots\RobotInterface;
use Robots\Robot;

class Robot1 extends Robot
{
    public function __construct()
    {
        self::_setter($this->getType(), 10, 200);
    }

    public function getType()
    {
        return get_class();
    }
}
