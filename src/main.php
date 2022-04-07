<?php
define('ROOT_DIR', realpath(dirname(__FILE__)).'/');

require ROOT_DIR.'_loader.php';

use Robots\FactoryRobot;
use Robots\Robot1;
use Robots\Robot2;
use Robots\MergeRobot;
use Robots\RobotException;

try
{
    $facktory = new FactoryRobot();

    $facktory->addType(new Robot1());
    $facktory->addType(new Robot2());

    var_dump($facktory->createRobot1(5));
    var_dump($facktory->createRobot2(2));

    $mergeRobot = new MergeRobot();
    
    $mergeRobot->addRobot(new Robot2());
    $mergeRobot->addRobot($facktory->createRobot2(2));

    $facktory->addType($mergeRobot);

    $res = reset($facktory->createMergeRobot(1));

    echo 'getSpeed: '.$res->getSpeed()."\n";
    echo 'getWeight: '.$res->getWeight()."\n";
} 
catch (RobotException $e)
{
    echo $e->getMessages();
}