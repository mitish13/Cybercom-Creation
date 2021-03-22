<?php



Mage::loadClassByFileName("block_core_Template");
class Block_Product_Form_Tabs_Attribute extends Block_Core_Template
{
    protected $products = null;
    protected $attributes = null;
    public function __construct()
    {
        $this->setTemplate("./product/form/tabs/attribute.php");
    }

    public function setProduct($products = null)
    {
        if (!$products) {
            $products = Mage::getModel("Model_ProductModel");
            if ($id = $this->getRequest()->getGet('id')) {
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


    public function getAttributes()
    {
        $attribute = Mage::getModel("Model_AttributeModel");
        $query = "select * from attribute where entityTypeId='product' ORDER BY sortOrder";
        $attributes = $attribute->fetchAll($query);
        
        
        return $attributes;
       
    }

    public function getOptions($id)
    {
        $option = Mage::getModel("Model_AttributeModel_OptionModel");

        $query = "select * from attributeoptions where attributeId='{$id}' ORDER BY sortOrder;";
        $options = $option->fetchAll($query);

        return $options;
    }
}
