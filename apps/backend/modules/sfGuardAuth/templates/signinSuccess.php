<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	
	<?php if($form['username']->renderError()) { ?>
	<div class="notification information png_bg">
		<div>
			<?php echo $form['username']->renderError(); ?>
		</div>
	</div>
	<?php } ?>
	
	<p>
		<?php echo $form['username']->render(array(
		  'class'  => 'text-input',
		  'value'  => __('Username or E-Mail'),
		)); ?>
	</p>
	
	<p>
		<?php echo $form['password']->render(array(
		  'class'  => 'text-input',
		  'value'  => __('Password'),
		)); ?>
	</p>
	
	<p class="formSubmit alignRight">
	  <?php echo $form['remember']; ?><?php echo __('Remember me'); ?><br />
		<input type="submit" class="button" value="<?php echo __('Se connecter', null, 'sf_guard') ?>" />
	</p>

	<?php echo $form['_csrf_token']; ?>
	        
  <?php $routes = $sf_context->getRouting()->getRoutes() ?>
  <p>
      <?php if (isset($routes['sf_guard_forgot_password'])): ?>
          <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <br />
      <?php endif; ?>
      
      <?php if (isset($routes['sf_guard_register'])): ?>
          <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
      <?php endif; ?>
  </p>

 	
</form>