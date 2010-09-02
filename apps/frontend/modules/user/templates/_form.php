<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
  <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <?php echo $form->renderHiddenFields(true) ?>
<tr>
  <td class="columns1">Username : </td>
  <td class="columns2"><input type="text" value="<?php echo $sf_user->getGuardUser()->getUsername() ?>" readonly /></td> 
</tr>
<tr>
  <td class="columns1"><?php echo $form['email_address']->renderLabel() ?> </td>
  <td class="columns2"><?php echo $form['email_address']; ?></td>
</tr>
<tr>
  <td class="columns1"><?php echo $form['password']->renderLabel() ?> </td>
  <td class="columns2"><?php echo $form['password']; ?></td>
</tr>
<?php if($sf_user->hasCredential('backend')): ?>
<tr>
  <td class="columns1">Permissions: </td>
  <td class="columns2"><?php echo $form['permissions_list']; ?></td>
  </td>
</tr>
<?php endif; ?>
<tr>
  <td colspan="2" class="columns3" ><input type="submit" value="Change my Profile" /> </td>
</tr>
</form>
