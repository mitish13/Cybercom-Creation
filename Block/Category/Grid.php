<?php


Mage::loadClassByFileName('block_core_template');

class Block_Category_Grid extends Block_Core_Template
{

    protected $categories = [];
    protected $categoryOptions = [];

    public function __construct()
    {
        $this->setTemplate('./category/grid.php');
    }

    public function setCategories($categories = null)
    {
        if (!$categories) {
            $categories = Mage::getModel("model_CategoryModel");
            $categories = $categories->fetchAll();
        }
        $this->categories = $categories;
        return $this;
    }

    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }

    public function setCategory($categories = null)
    {
        if (!$categories) {
            $categories = Mage::getModel("Model_CategoryModel")->fetchAll();
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



    public function getTitle()
    {
        return "Manage Categories";
    }

    public function getName($category)
    {  
       
        $categoryModel = Mage::getModel('Model_CategoryModel');
        if (!$this->categoryOptions) {
           
            $query = "SELECT `categoryId`,`categoryName` FROM `{$categoryModel->getTableName()}`";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
           
        }
      
        $pathids = explode("=", $category->pathId);
        
        // print_r($this->categoryOptions);
        foreach ($pathids as $key => &$id) {
            if (array_key_exists($id, $this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode("/", $pathids);
        
        return $name;
    }
}
