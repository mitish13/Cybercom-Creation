<?php
$tabs = $this->getTabs();

$urlTab = $this->getRequest()->getGet('tab');

foreach ($tabs as $key => $value) {
    $active = ""; ?>
  <a href="<?php echo  $value['label'] == "Group Price" ? $this->getUrl()->getUrl('form',null,["tab"=>$key])  : $this->getUrl()->getUrl('form',null,["tab"=>$key]); ?>" class="p-4 list-group-item list-group-item-action flex-column align-items-start"  style="background-color: #1fb8ff; color:white">

        <?php echo $value['label'] ?>
    </a>
<?php } ?>