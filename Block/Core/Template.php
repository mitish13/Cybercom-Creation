<?php

class Block_Core_Template
{
    protected $template = null;
    protected $children = [];
    protected $message = null;
    protected $request = null;
    protected $url = null;

    public function __construct()
    {
        $this->setRequest();
        $this->setUrl();
    }

    public function getChildren()
    {
        return $this->children;
    }
    public function setChildren($children = null)
    {
        $this->children = $children;
        return $this;
    }
    public function addChild(Block_Core_Template $child, $key = null)
    {
        if (!$key) {
            $key = get_class($child);
        }
        return $this->children[$key] = $child;
    }
    public function removeChild($key)
    {
        if (!array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }
    public function createBlock($className)
    {
        return Mage::getBlock($className, $this);
    }

    public function setUrl($url = null)
    {
        if (!$url) {
            $url = Mage::getModel("model_core_url");
        }
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }

    public function getChild($key)
    {
        if (!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }
    public function toHtml()
    {
        ob_start();
        require_once("./View/" . $this->getTemplate());
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function setRequest($request = null)
    {
        if (!$request) {
            $request = Mage::getModel("Model_Core_Request");
        }
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function redirect($actionName = NULL, $controllerName = NULL, $params = NULL, $resetParams = false)
    {

        header("location:" . $this->getUrl($actionName, $controllerName, $params, $resetParams));
        exit();
    }

    // public function setController(Controller_Core_Admin $controllarName)
    // {
    //     $this->controller = $controllarName;
    //     return $this;
    // }
    // public function getController()
    // {
    //     return $this->controller;
    // }

    public function getMessage()
    {
        return Mage::getModel("model_admin_message");
    }
}
