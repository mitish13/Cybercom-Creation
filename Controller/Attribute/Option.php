<?php


Mage::loadClassByFileName('Controller_Core_Admin');

class Controller_Attribute_Option extends Controller_Core_Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Post Request", 1);
            }
            $data = $this->getRequest()->getPost();
            
            if (array_key_exists('existing', $data)) {
                foreach ($data['existing'] as $optionId => $name) {
                    $attributeOptionModel = Mage::getModel("Model_AttributeModel_OptionModel");
                    $query = "Update `attributeoptions` set `name`= '{$name['name']}', `sortOrder`='{$name['sortOrder']}' where  `attributeId`={$attributeId} and `optionId`={$optionId}";
                    
                    if ($attributeOptionModel->update($query)) {
                        $this->getMessage()->setSuccess("Option Updated SuccessFully !!");
                    }
                }
            }
            
            if (array_key_exists('new', $data)) {
                
                $data['new'] = array_combine($data['new']['name'], $data['new']['sortOrder']);
                $attributeId = $this->getRequest()->getGet('id');
                
                foreach ($data['new'] as $name => $sortOrder) {
                    if ($name) {
                        $attributeOptionModel = Mage::getModel("Model_AttributeModel_OptionModel");
                        
                        $attributeOptionModel->attributeId  = $attributeId;
                        $attributeOptionModel->name = $name;
                        $attributeOptionModel->sortOrder = $sortOrder;
                        
                        if ($attributeOptionModel->save()) {
                            $this->getMessage()->setSuccess("Option Updated SuccessFully !!");
                        }
                    }
                }
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

        $this->redirect('form', 'attribute', null, false);
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('optionId');

            $delModel = Mage::getModel('Model_AttributeModel_OptionModel');
            $delModel->id = $id;
            $delModel->delete();
            if ($delModel->delete()) {
                $this->getMessage()->setSuccess("Option Deleted SuccessFully !!");
            } else {
                throw new Exception("Error While Deleting Data!!");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', 'attribute', null, false);
    }
}
