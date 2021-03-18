<?php

Mage::loadClassByFileName("block_core_template");
class Block_Product_Form_Tabs_Form extends Block_Core_Template{
    protected $products = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./product/form/tabs/form.php");
    }

    public function setProduct($products = null)
    {
        if (!$products) 
        {
            $products = Mage::getModel("Model_productModel");
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $product = $products->load($id);
                if (!$product) {
                    return null;
                }
            }  
        }
        $this->products = $products;
        return $this;
    }

    public function getProduct()
    {
        if (!$this->products) {
            $this->setProduct();
        }
        return $this->products;     
    }  

}