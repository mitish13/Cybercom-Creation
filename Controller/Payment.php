<?php

Mage::loadClassByFileName('controller_core_admin');


class Controller_Payment extends Controller_Core_Admin

{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {

        $gridBlock = Mage::getBlock("block_payment_grid");
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");
        $layout->getChild("Content")->addChild($gridBlock, 'Grid');
        $this->renderLayout();
    }
    public function formAction()
    {
        $layout = $this->getLayout();

        $Tabs = Mage::getBlock("block_payment_form_tabs");
        $layout->getChild('Sidebar')->addChild($Tabs, 'Tab');

        $form = Mage::getBlock('block_payment_form');
        $layout->getChild('Content')->addChild($form, 'Grid');

        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $payment = Mage::getModel("Model_paymentModel");
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Post Request");
            }
            $paymentId = $this->getRequest()->getGet('id');
            if (!$paymentId) {
                date_default_timezone_set('Asia/Kolkata');
                $payment->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Payment Done !!");
            } else {
                $payment =  $payment->load($paymentId);
                if (!$payment) {
                    throw new Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Payment Updated !!");
            }

            $paymentData = $this->getRequest()->getPost('payment');

            if (!array_key_exists('status', $paymentData)) {
                $paymentData['status'] = 0;
            } else {
                $paymentData['status'] = 1;
            }

            $payment->setData($paymentData);
            $payment->save();
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
    public function changeStatusAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            $st = $this->getRequest()->getGet('status');
            $model = Mage::getModel('model_paymentModel');
            $model->id = $id;
            $model->status = $st;

            if (!$model->changeStatus()) {
                throw new Exception("Status Change Failed!!");
            }
            $this->getMessage()->setSuccess("Payment Status Updated !!");
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
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
            $delModel = Mage::getModel('model_paymentModel');
            $delModel->id = $id;
            $delModel->delete();
            if ($delModel->delete()) {
                $this->getMessage()->setSuccess("Payment Deleted !!");
            } else {
                $this->getMessage()->setFailure("Unable To Delete Payment !!");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
}
