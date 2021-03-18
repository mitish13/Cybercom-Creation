<?php
$attribute = $this->getAttribute();
?>
<div>
    <h2 class="m-4"><?php $this->getTitle(); ?></h2>
    <hr>
    <form method="POST" action="<?php echo $this->getUrl("save", null, ['id' => $attribute->attributeId], true); ?>">
        <?php echo $this->getTabContent()->toHtml(); ?>
    </form>
</div>