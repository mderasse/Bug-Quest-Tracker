<?php use_helper('I18N') ?>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>

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