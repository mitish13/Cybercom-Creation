<?php

Mage::loadClassByFileName('controller_core_admin');


class Controller_Customer extends Controller_Core_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {

        $gridBlock = Mage::getBlock("block_customer_grid");
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");
        $layout->getChild("Content")->addChild($gridBlock, 'Grid');
        $this->renderLayout();
    }
    public function formAction()
    {

        $form = Mage::getBlock('block_customer_form');
        $layout = $this->getLayout();


        $customerTab = Mage::getBlock("block_customer_form_tabs");
        $layout->getChild('Sidebar')->addChild($customerTab, 'Tab');

        $layout->getChild('Content')->addChild($form, 'Grid');
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $customer = Mage::getModel("Model_customerModel");
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Post Request");
            }
            $customerId = $this->getRequest()->getGet('id');
            if (!$customerId) {
                date_default_timezone_set('Asia/Kolkata');
                $customer->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Customer Inserted Successfully");
            } else {
                $customer =  $customer->load($customerId);
                if (!$customer) {
                    throw new Exception("Data Not Found");
                }
                date_default_timezone_set('Asia/Kolkata');
                $customer->updatedDate = date("y-m-d h:i:s");
                $this->getMessage()->setSuccess("Customer Updated Successfully");
            }

            $customerData = $this->getRequest()->getPost('customer');
           
            if (!array_key_exists('status', $customerData)) {
                $customerData['status'] = 0;
            } else {
                $customerData['status'] = 1;
            }
            $customer->setData($customerData);
            $customer->save();
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
            $model = Mage::getModel('model_customerModel');
            $model->id = $id;
            $model->status = $st;
            $model->changeStatus();
            if ($model->changeStatus()) {
                $this->getMessage()->setSuccess("Customer Status Updated Successfully");
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
            $delModel = Mage::getModel('model_customerModel');
            $delModel->id = $id;
            $delModel->delete();
            if ($delModel->delete()) {
                $this->getMessage()->setSuccess("Customer Deleted SuccessFully !!");
            } else {
                $this->getMessage()->setFailure("Unable to Delete Customer!!");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
}
