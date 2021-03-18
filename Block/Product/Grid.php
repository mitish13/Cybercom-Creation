<?php


Mage::loadClassByFileName('block_core_template');

class Block_Product_Grid extends Block_Core_Template{

    protected $products = null;
    protected $message = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./product/grid.php');
        
    }
    public function setProducts($products = null)
    {
        if (!$products) {
            $products = Mage::getModel("model_productModel");
            $products = $products->fetchAll();
        }
        $this->products = $products;
         return $this;
    }
    public function getProducts()
    {
        if (!$this->products) {
            $this->setProducts();
            
        }
        return $this->products;     
    }
    public function getTitle()
    {
        return "Manage Products";
    }

    
}
