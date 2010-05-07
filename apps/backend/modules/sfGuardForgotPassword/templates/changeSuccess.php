<?php use_helper('I18N') ?>
<h2><?php echo __('Change your password') ?></h2>

<p style="margin-top: 20px;">
  <?php echo __('Hello %name%', array('%name%' => $user->getName()), 'sf_guard') ?><br />
  <?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?>
</p>

<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
  
  <p>
    <input id="password-clear" class="text-input" type="text" value="Password" autocomplete="off" />
  	<?php echo $form['password']->render(array('class' => 'text-input')); ?>
  </p>
  
  <p>
    <input id="password-again-clear" class="text-input" type="text" value="Password again" autocomplete="off" />
  	<?php echo $form['password_again']->render(array('class' => 'text-input')); ?>
  </p>
  
  <p class="formSubmit alignRight">
      <input type="submit" class="button" name="change" value="<?php echo __('Change', null, 'sf_guard') ?>" />
  </p>
  
  <?php echo $form['id']; ?>
  <?php echo $form['_csrf_token']; ?>
  
</form>