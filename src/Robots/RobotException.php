<?php
namespace Robots;

Class RobotException extends \Exception
{
    private $m;
    
    public function __construct($m)
    {
        parent::__construct($m);
        $this->m[] = $m;
    }

    public function getMessages()
    {
        return implode(";\n", $this->m)."\n";
    }
}