


<?php
 $errors ="";
 ?>
<?php if (count($errors)>0): ?>

<div class="error">
  <?php foreach ($errors as $error =>$err):?>
  <p> <?php echo $err;?> </p>
  <?php endforeach; ?>
</div>
<?php endif ?>
