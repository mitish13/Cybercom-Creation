<?php

class Controller_Core_Front{
    public static function init()
    {
        $reqest = Mage::getModel('model_core_request');

        $controllerName = ucwords($reqest->getControllerName());
        $controllerName = "Controller_".$controllerName;
        $actionName = $reqest->getActionName()."Action";
        $controller = Mage::getController($controllerName);
        $controller = new $controllerName();
        $controller->$actionName();
    }
}

?>