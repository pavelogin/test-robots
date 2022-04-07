<?php
namespace Robots;

class Robot implements RobotInterface
{
    protected static $weight, $speed;

    public function getRobots($quant = 1)
    {
        $result = [];
        for($i=1; $quant >= $i; ++$i)
        {
            $result[] = $this;
        }
        return $result;
    }

    public function getType()
    {
        return get_class();
    }

    protected static function _setter($type, $speed, $weight)
    {
        self::$speed[$type] = $speed;
        self::$weight[$type] = $weight;
    }

}