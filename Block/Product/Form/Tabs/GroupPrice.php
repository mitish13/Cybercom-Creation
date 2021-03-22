<?php


Mage::loadClassByFileName("block_core_Template");

class  Block_Product_Form_Tabs_GroupPrice extends Block_Core_Template
{

    protected $product = [];
    public function __construct()
    {
        $this->setTemplate("./product/form/tabs/groupPrice.php");
    }

    public function setProduct(Model_ProductModel $product)
    {
        $this->product = $product;
       
        return $this;
    } 

    public function getProduct()
    {
        
        return $this->product;
    }
    
    public function getCustomerGroup()
    {
    //  $query = "SELECT `cg`.`customerGroupId`,`cg`.`name`,`cgp`.`groupPriceId`,`cgp`.`price`,`p`.`productId`,`p`.`price` as `productPrice` FROM `{$customerGroup->getTableName()}` as `cg` LEFT JOIN `{$groupPrices->getTableName()}` as `cgp` ON `cgp`.`customerGroupId` = `cg`.`customerGroupId` AND `cgp`.`productId` = '{$productId}' LEFT JOIN `{$product->getTableName()}` as `p` ON `p`.`productId` = '{$productId}'";
        $id = $this->getRequest()->getGet('id');
     
        $query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.groupPrice,p.productPrice as price
                FROM customer_group cg
                    LEFT JOIN product_group_price pgp 
                        ON pgp.groupId = cg.group_id
                            AND pgp.productId = '{$id}'
                    LEFT JOIN product p
                        ON pgp.productId = p.productId
        ";
        
        $customerGroups = Mage::getModel("Model_CustomerGroupModel");   
    
        $customerGroup =  $customerGroups->fetchAll($query);
        return $customerGroup;
    }
    
}   
