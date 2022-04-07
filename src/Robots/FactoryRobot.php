<?php
namespace Robots;
use Robots\RobotException;

class FactoryRobot
{
    private $robots;

    public function addType(RobotInterface $class)
    {
        $key = $class->getType();
        $this->robots[$key] = $class;
    }

    public function __call($var, $params)
    {
        //$keys = ['createRobot1' => 'Robot1', 'createRobot2' => 'Robot2'];
        $var = str_replace('create', '', $var);
        $var = 'Robots\\'.$var;

        if(!isset($this->robots[$var]))
        {
            echo "--------------------------------------------------------\n";
            var_dump($this->robots);
            throw new RobotException('Не найден тип Робота: '.$var);
        }
        $class = $this->robots[$var];
        return  $class->getRobots($params[0]);
    }
}