<?php

Mage::loadClassByFileName("Model_Core_Table");
class Model_CategoryModel extends Model_Core_Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('category')->setPrimaryKey('categoryId');
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];
    }

    public function updatePathId()
    {
   
        if (!$this->parentId) {
             
            $pathId = $this->categoryId;
            
        } else {
            
            $parent = Mage::getModel('Model_CategoryModel')->load($this->parentId);
            if (!$parent) {
                throw new Exception("Unable To Load Parent", 1);
            }
            $pathId = $parent->pathId . "=" . $this->categoryId;
        }

        $this->pathId = $pathId;
       
        return $this->save();
    }
    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId."=";
        $query = "SELECT * FROM `category` WHERE `pathId` LIKE '{$categoryPathId}%' ORDER BY `pathId` ASC";
        
        $categories = $this->getAdapter()->fetchAll($query);
        
        if ($categories) {
            foreach ($categories as $key => $row) {
                $row = Mage::getModel('Model_CategoryModel')->load($row['categoryId']);
                if ($parentId != null) {
                    $row->parentId = $parentId;
                }
                $row->updatePathId();
            }
        }
    }
}
