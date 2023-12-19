<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo '<span class="error-message">' . $error . '</span><br>'; ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<style>
    .error-message {
        color: red;
    }
</style>