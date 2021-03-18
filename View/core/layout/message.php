<?php if ($success = $this->getMessage()->getSuccess()) : ?>
  <?php $this->getMessage()->clearSuccess(); ?>
  <div style="margin-bottom: 10px; border:1px solid black; padding:10px" >
    <?php echo $success; ?>
  </div>
<?php endif; ?>

<?php if ($failure = $this->getMessage()->getFailure()) : ?>
  <?php $this->getMessage()->clearFailure(); ?>
  <div style="margin-bottom: 10px; border:1px solid black; padding:10px" >
    <?php echo $failure; ?>
  </div>
<?php endif; ?>