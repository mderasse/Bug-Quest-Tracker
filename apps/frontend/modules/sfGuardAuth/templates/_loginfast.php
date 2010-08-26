<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
<?php echo $form->renderHiddenFields(true) ?>
User : <?php echo $form['username']; ?> Password : <?php echo $form['password']; ?><br /><input type="submit" value="Sign In" />
</form>
