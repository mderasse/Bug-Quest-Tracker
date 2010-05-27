<?php use_helper('I18N') ?>
<h2><?php echo __('Forgot your password?', null, 'sf_guard') ?></h2>

<p style="margin-top: 20px">
  <?php echo __('Do not worry, we can help you get back in to your account safely!', null, 'sf_guard') ?>
  <?php echo __('Fill out the form below to request an e-mail with information on how to reset your password.', null, 'sf_guard') ?>
</p>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="notification error">
  	<div>
  	  <?php echo $sf_user->getFlash('error') ?>
  	</div>
  </div>
<?php endif ?>

<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post" style="margin-top: 20px;">
  
  <p>
  	<?php echo $form['email_address']->renderLabel(); ?>
  	<?php echo $form['email_address']->render(array('class' => 'text-input')); ?>
  </p>

  <p class="formSubmit alignRight">
      <input type="submit" class="button" name="change" value="<?php echo __('Request', null, 'sf_guard') ?>" />
  </p>
    
  <?php echo $form['_csrf_token']; ?>
  
</form>