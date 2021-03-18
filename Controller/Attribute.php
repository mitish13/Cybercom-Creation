<?php
Mage::loadClassByFileName('Controller_Core_Admin');

class Controller_Attribute extends Controller_Core_Admin
{
    public function gridAction()
    {
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");
        
        $grid = Mage::getBlock('Block_Attribute_Grid');
        $layout->getChild("Content")->addChild($grid,'grid');
      
        $this->renderLayout();
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');

        $edit = Mage::getBlock("Block_Attribute_Edit");
        $edit->setController($this);
        $content->addChild($edit, 'edit');

        $left = $layout->getChild('left');
        $left->setController(new Controller_Core_Admin());
        $tabs = Mage::getBlock("Block_Attribute_Edit_Tabs");
        $tabs->setController($this);
        $left->addChild($tabs, 'tabs');
        echo $layout->toHtml();
    }

    public function editAction()
    {
        try {
            $edit = Mage::getBlock("Block_Attribute_Edit");
            $edit->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getChild('content')->addChild($edit);
            echo $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }


    public function saveAction()
    {
        if ($this->getRequest()->getGet('tab') != 'option') {
            try {
                if (!$this->getRequest()->isPost()) {
                    throw new Exception("invalid Request");
                }
                $attribute = Mage::getModel("Model_Attribute");
                if ((int)$id = $this->getRequest()->getGet("id")) {
                    $attribute = $attribute->load($id);
                    if (!$attribute) {
                        throw new Exception("No record.");
                    }
                }
                $attributeData = $this->getRequest()->getPost('attribute');
                $attribute->setData($attributeData);
                $attribute->save();
                $this->redirect('grid');
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        } else {
            $this->updateOptions();
        }
    }

    public function optionAction()
    {
        try {
            $option = Mage::getBlock("Block_Attribute_Edit_Tabs");
            $option->setController($this);
            $layout = $this->getLayout();
            $layout->getChild('content')->addChild($option);
            echo $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function updateOptions()
    {
        $optionData = $this->getRequest()->getPost('option');
        try {
            if (!$optionData) {
                throw new Exception("invalid Request");
            }
            foreach ($optionData['exist'] as $optionId => $optionValues) {
                $option = Mage::getModel('Model_Attribute_Option');
                $option->setData($optionValues);
                // $option->save();
                die;
            }
            foreach ($optionData['new'] as $optionId => $optionValues) {
                $option = Mage::getModel('Model_Attribute_Option');
                $option->setData($optionValues);
            }

            $this->redirect('grid');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception("Id Required.");
            }
            $attribute = Mage::getModel("Model_Attribute");
            $attribute->load($id);
            if ($attribute->delete($id)) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid');
    }

    public function deleteOptionAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception("Id Required.");
            }
            $option = Mage::getModel("Model_Attribute_Option");
            $option->load($id);
            if ($option->delete($id)) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', null, ['id' => $option->attributeId], true);
    }
}
