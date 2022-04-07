<?php
namespace Robots;

interface RobotInterface
{
    public function getRobots($quant = 1);

    public function getType();

}