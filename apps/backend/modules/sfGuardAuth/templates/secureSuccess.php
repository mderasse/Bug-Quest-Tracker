<?php use_helper('I18N') ?>

<h2><?php echo __('Oops! The page you asked for is secure and you do not have proper credentials.', null, 'sf_guard') ?></h2>

<div class="table-signin">
<h1>Sign In</h1>
<table>
  <tbody>
    <?php echo get_component('sfGuardAuth', 'signin_form') ?>
  </tbody>
</table>
</div>

