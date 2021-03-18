<?php

Mage::loadClassByFileName('controller_core_admin');


class Controller_CustomerGroup extends Controller_Core_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {

        $gridBlock = Mage::getBlock("block_customerGroup_grid");
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");
        $layout->getChild("Content")->addChild($gridBlock, 'Grid');
        $this->renderLayout();
    }
    public function formAction()
    {
        $layout = $this->getLayout();

        $form = Mage::getBlock('block_customerGroup_form');
        $layout->getChild('Content')->addChild($form, 'Grid');

        $tab = Mage::getBlock("block_customerGroup_form_tabs");
        $layout->getChild('Sidebar')->addChild($tab, 'Tab');

        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $customerGroup = Mage::getModel("Model_customerGroupModel");

            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Post Request");
            }
            $customerGroupId = $this->getRequest()->getGet('id');
            if (!$customerGroupId) {
                date_default_timezone_set('Asia/Kolkata');
                $customerGroup->createdDate = date("Y-m-d H:i:s");

                $this->getMessage()->setSuccess("Customer Group Inserted Successfully");
            } else {
                $customerGroup =  $customerGroup->load($customerGroupId);
                if (!$customerGroup) {
                    throw new Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Customer Group Updated Successfully");
            }

            $customerGroupData = $this->getRequest()->getPost('customerGroup');
            $customerGroup->setData($customerGroupData);
            
            $customerGroup->save();
        } catch (Exception $e) {
            $this->getMessage()->setFailed($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
    public function changeStatusAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            $st = $this->getRequest()->getGet('status');
            $customerGroup = Mage::getModel('model_customerGroupModel');
            $customerGroup->id = $id;
            $customerGroup->status = $st;
            $customerGroup->changeStatus();
            if ($customerGroup->changeStatus()) {
                $this->getMessage()->setSuccess("Customer Group Status Updated Successfully");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailed($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }

    public function deleteAction()
    {
        try {
            if ($this->request->isPost()) {
                throw new Exception("Invalid Request");
            }

            $id = $this->getRequest()->getGet('id');
            $delModel = Mage::getModel('model_customerGroupModel');
            $delModel->id = $id;
        
            $delModel->delete();
            if ($delModel->delete()) {
                $this->getMessage()->setSuccess("Customer Group Deleted SuccessFully !!");
            } else {
                $this->getMessage()->setFailure("Unable to Delete Customer Group!!");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
}
