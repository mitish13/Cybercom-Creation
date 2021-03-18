<?php
class Mage
{   
    
    public static function init()
    {
        self::loadClassByFileName('Controller_Core_Front');
        Controller_Core_Front::init();
	
        
    }
    public static function getModel($className)
    {
        self::loadClassByFileName($className);
        
        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '_', $className);
        return new $className;
        
    }
    public static function getBlock($className)
    {
        self::loadClassByFileName($className);

        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '_', $className);
        return new $className();
      
    }
    public static function getController($className)
    {
        self::loadClassByFileName($className);

        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '_', $className);
        return new $className;
       
    }
    public static function loadClassByFileName($className)
    {
        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '/', $className);
        $className = $className . '.php';

        
        require_once($className);
    }
}

Mage::init();
