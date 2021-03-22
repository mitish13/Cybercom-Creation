<?php


Mage::getController("Controller_Core_Admin");
class Controller_GroupPrice extends Controller_Core_Admin
{


    public function saveAction()
    {
        $productId = $this->getRequest()->getGet('id'); 
        $groupData = $this->getRequest()->getPost('groupPrice');
        if(array_key_exists('Exist',$groupData)){
            foreach ($groupData['Exist'] as $group_id => $groupPrice) {
                $query ="UPDATE product_group_price SET groupPrice = {$groupPrice} WHERE groupId = {$group_id} AND productId = {$productId}";
                $groupPriceModel = Mage::getModel("Model_GroupPriceModel");
                $groupPriceModel->update($query);
                
            }
        }
        
        if(array_key_exists('New',$groupData)){
            foreach ($groupData['New'] as $group_id => $groupPrice) {
                $groupPriceModel = Mage::getModel("Model_GroupPriceModel");
                $groupPriceModel->productId = $productId;
                $groupPriceModel->groupId = $group_id;
                $groupPriceModel->groupPrice = $groupPrice;
                
                    
                    $groupPriceModel->save();   
                }
            }


       $this->redirect('grid','product',null,false);
    }
}


?>