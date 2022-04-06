<?php
define('ROOT_DIR', realpath(dirname(__FILE__)).'/');
// подключаем по необходимости объекты
spl_autoload_register(
    function ($className) 
    {
	
        $classFile = ROOT_DIR.'/'.$className.'.php';
        
        if(file_exists($classFile))
        {
            if(include_once($classFile))
            {
                if (!class_exists($className, FALSE) || !trait_exists($className, FALSE) || !interface_exists($className, FALSE) ) 
                {
                    echo('класс '.$className.' - не найден в файле '.$classFile);
                }
            }
            else
            {
                echo('класс '.$className.' :: файл '.$classFile.' - не удалось подключить');
            }
        }
        else
        {
            echo('класс '.$className.' :: файл '.$classFile.' - не найден');
        }
    }
);