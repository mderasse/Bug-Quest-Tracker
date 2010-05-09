<?php use_helper('I18n') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	
	<?php if($form['username']->renderError()): ?>
	<div class="notification error">
		<div>
			<?php echo $form['username']->renderError(); ?>			
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($sf_user->hasFlash('notice')): ?>
	  <div class="notification notice">
	  	<div>
	  	  <?php echo $sf_user->getFlash('notice') ?>
	  	</div>
	  </div>
	<?php endif ?>
	
	<?php if ($sf_user->hasFlash('error')): ?>
	  <div class="notification error">
	  	<div>
	  	  <?php echo $sf_user->getFlash('error') ?>
	  	</div>
	  </div>
	<?php endif ?>
	
	<p>
		<?php echo $form['username']->render(array(
		  'class'  => 'text-input',
		)); ?>
	</p>
	
	<input id="password-clear" class="text-input" type="text" value="Password" autocomplete="off" />
	<p>
		<?php echo $form['password']->render(array(
		  'class'  => 'text-input',
		)); ?>
	</p>
	
	<p class="formSubmit alignRight">
	  <?php echo $form['remember']; ?><?php echo __('Remember me', null, 'sf_guard'); ?><br />
		<input type="submit" class="button" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
	</p>

	<?php echo $form['_csrf_token']; ?>
 	
</form>