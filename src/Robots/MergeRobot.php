<?php
namespace Robots;
use Robots\RobotInterface;

class MergeRobot extends Robot
{
    private $w, $s;

    public function __construct()
    {
        $this->w = []; $this->s = [];
        self::_setter($this->getType(), 20, 100);
    }

    public function addRobot($class)
    {
        if(!is_array($class)) 
        {
            $class = [$class];
        }
        $type = reset($class)->getType();
        $this->w = array_pad($this->w, count($this->w) + count($class), parent::$weight[$type]);
        $this->s = array_pad($this->s, count($this->s) + count($class), parent::$speed[$type]);
    }

    public function getWeight()
    {
        return array_sum($this->w);
    }

    public function getSpeed()
    {
        array_multisort($this->s, SORT_DESC, SORT_NUMERIC);
        return $this->s[0];
    }

    public function getType()
    {
        return get_class();
    }
}