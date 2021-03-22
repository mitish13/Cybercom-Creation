<?php

Mage::loadClassByFileName('controller_core_admin');

class Controller_Product extends Controller_Core_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        $gridBlock = Mage::getBlock("block_product_grid");
        $layout = $this->getLayout();
        $layout->setTemplate("./core/layout/one_column.php");
        $layout->getChild("Content")->addChild($gridBlock, 'Grid');
        $this->renderLayout();
    }
    public function formAction()
    {

        $layout = $this->getLayout();
        
         $productTab = Mage::getBlock("block_product_form_tabs");
         $layout->getChild('Sidebar')->addChild($productTab, 'Tab');

        $form = Mage::getBlock('block_product_form');
        $layout->getChild('Content')->addChild($form, 'Grid');

        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $product = Mage::getModel("Model_productModel");
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Post Request", 1);
            }
            $productId = $this->getRequest()->getGet('id');

            if (!$productId) {
                date_default_timezone_set('Asia/Kolkata');
                $product->createdDate = date("Y-m-d H:i:s");

                $this->getMessage()->setSuccess("Product Inserted SuccessFully !!");
            } else {
                $product =  $product->load($productId);
                if (!$product) {
                    throw new Exception("Data Not Found", 1);
                }
                date_default_timezone_set('Asia/Kolkata');
                $product->updatedDate = date("y-m-d h:i:s");
                $product->productId = $productId;

                $this->getMessage()->setSuccess("Product Updated SuccessFully !!");
            }

            $productData = $this->getRequest()->getPost('product');

            if (!array_key_exists('status', $productData)) {
                $productData['status'] = 0;
            } else {
                $productData['status'] = 1;
            }

            $product->setData($productData);
            $product->save();
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
            $model = Mage::getModel('model_productModel');
            $model->id = $id;
            $model->status = $st;
            if ($model->changeStatus()) {
                $this->getMessage()->setSuccess("Status Changed Successfully");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }
    public function deleteAction()
    {
        try {
            if ($this->request->isPost()) {
                throw new Exception("Invalid Request", 1);
            }

            $id = $this->getRequest()->getGet('id');
            $delModel = Mage::getModel('model_productModel');
            $delModel->id = $id;

            //Delete photos from directory
            $query = "SELECT imageName from productgallery where productId=$id";
           
            $Media = Mage::getModel('model_mediaModel');
            $filenames = $Media->fetchAll($query);
            if($filenames){
            foreach ($filenames->getData() as $key => $value) {
                
                unlink(getcwd()."\Skin\admin\images\\{$id}\\{$value->imageName}");
            }
            }
            $delModel->delete();

            if ($delModel->delete()) {
                $this->getMessage()->setSuccess("Product Deleted SuccessFully !!");
            } else {
                $this->getMessage()->setFailure("Error While Deleting Data!!");
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        $this->redirect('grid', null, null, true);
    }
}
