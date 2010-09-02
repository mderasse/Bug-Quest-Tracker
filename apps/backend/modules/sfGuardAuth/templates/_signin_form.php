<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
<?php echo $form->renderHiddenFields(true) ?>
<tr>
  <td class="columns1">Username : </td>
  <td class="columns2"><?php echo $form['username']; ?></td>
</tr>
<tr>
  <td class="columns1">Password : </td>
  <td class="columns2"><?php echo $form['password']; ?></td>
</tr>
<tr>
  <td colspan="2" class="columns3" ><input type="submit" value="Sign In" /> </td>
</tr>
</form>
