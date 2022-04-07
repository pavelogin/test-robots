<?php

// подключаем по необходимости объекты
spl_autoload_register(
    function ($className) 
    {
	
        $classFile = ROOT_DIR.str_replace('\\','/',$className).'.php';

        if(file_exists($classFile))
        {
            if(include_once($classFile))
            {
                if (class_exists($className, FALSE) || trait_exists($className, FALSE) || interface_exists($className, FALSE) ) 
                {
                    return true;
                }
                else
                {
                //    echo('класс '.$className.' - не найден в файле '.$classFile);    
                }
            }
            else
            {
              //  echo('класс '.$className.' :: файл '.$classFile." - не удалось подключить\n");
            }
        }
        else
        {
            //echo('класс '.$className.' :: файл '.$classFile." - не найден\n");
        }
        // exit; // не вываливаемся и не публикуем сообщения (PSR-4)
    }
);