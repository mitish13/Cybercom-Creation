<?php

Mage::loadClassByFileName("block_core_template");
class Block_Category_Form_Tabs_Form extends Block_Core_Template
{
    protected $categories = null;
    protected $categoryOptions = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./category/form/tabs/form.php");
    }

    public function setCategory($categories = null)
    {
        if (!$categories) {
            $categories = Mage::getModel("Model_categoryModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $category = $categories->load($id);
                if (!$category) {
                    return null;
                }
            }
        }
        $this->categories = $categories;
        return $this;
    }
    public function getCategory()
    {
        if (!$this->categories) {
            $this->setCategory();
        }
        return $this->categories;
    }

    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {

            $query = "select `categoryId`,`categoryName` from {$this->getCategory()->getTableName()}";
            $options = $this->getCategory()->getAdapter()->fetchPairs($query);
           
            // WHERE pathId NOT LIKE '{$this->getCategory()->pathId}' ORDER BY `pathId` ASC
             $query = "select `categoryId`,`pathId` from {$this->getCategory()->getTableName()} v WHERE pathId NOT LIKE '{$this->getCategory()->pathId}' ORDER BY `pathId` ASC";
          
             $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            
            if($this->categoryOptions){
            foreach ($this->categoryOptions as $categoryId => &$pathId) {
                $pathIds = explode("=", $pathId);
                foreach ($pathIds as $key => &$id) {
                    if (array_key_exists($id, $options)) {
                        $id = $options[$id];
                    }
                }
                $pathId = implode("/", $pathIds);
    
            }}
            
                $this->categoryOptions = ["" => "Root Category"] + $this->categoryOptions;
        }
       
        return $this->categoryOptions;
    }
}
