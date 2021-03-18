<?php

Mage::loadClassByFileName('Controller_Core_Admin');

class Controller_Category extends Controller_Core_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");

        $gridBlock = Mage::getBlock("block_category_grid");
        $layout->getChild("Content")->addChild($gridBlock, 'Grid');

        $this->renderLayout();
    }

    public function editAction()
    {
        try {
            if (!($id = $this->getRequest()->getGet('id'))) {
                throw new Exception("Id Not Found", 1);
            }

            $layout = $this->getLayout();

            $categoryTab = Mage::getBlock("block_category_form_tabs");
            $layout->getChild('Sidebar')->addChild($categoryTab, 'Tab');

            $form = Mage::getBlock('block_category_form');
            $layout->getChild('Content')->addChild($form, 'Grid');

            $this->renderLayout();
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid');
        }
    }

    public function formAction()
    {
        $layout = $this->getLayout();

        $categoryTab = Mage::getBlock("block_category_form_tabs");
        $layout->getChild('Sidebar')->addChild($categoryTab, 'Tab');

        $form = Mage::getBlock('block_category_form');
        $layout->getChild('Content')->addChild($form, 'Grid');
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $cat = Mage::getModel('Model_CategoryModel');    
            $category_data = $this->getRequest()->getPost('category');
            
            $cat->setData($category_data);
            
            if ($id = $this->getRequest()->getGet('id')) {
                $cat = $cat->load($id);
                if (!$cat) {
                    throw new Exception('Please Enter Valid ID');
                }
               
                $this->getMessage()->setSuccess('Record Updated Successfully.....');
                
            } else {
                
                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
           
            
            $categoryPathId = $cat->pathId;
            
            $cat->updatePathId();
            $cat->updateChildrenPathIds($categoryPathId);
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }
        $this->redirect('grid', null, [], true);
    }


    public function changeStatusAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            $st = $this->getRequest()->getGet('status');
            $model = Mage::getModel('model_categoryModel');
            $model->id = $id;
            $model->status = $st;
            $model->changeStatus();
            if ($model->changeStatus()) {
                $this->getMessage()->setSuccess("Status Changed Successfully");
            }
        } catch (Exception $e) {
            $this->getMessage()->setSuccess($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
    public function deleteAction()
    {
        try {
            $category = Mage::getModel('model_categoryModel');
            if ($id = $this->getRequest()->getGet('id')) {
                $category = $category->load($id);
                if (!$category) {
                    throw new Exception("Invalid ID");
                }
            }
            $parentId = $category->parentId;
            $pathId = $category->pathId;
            
            $category->updateChildrenPathIds($pathId, $parentId);
            
            $category->id = $category->categoryId;
            $category->delete();
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
}
