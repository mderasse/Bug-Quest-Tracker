<h2 class="helvetica light">Merci !</h2>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="notification error">
  	<div>
  	  <?php echo $sf_user->getFlash('error') ?>
  	</div>
  </div>
<?php endif ?>

<p>Nous vous remercions de nous avoir contacté.<br />
Voici les informations que vous nous avez envoyé :</p>

<ul>
	<li>Nom : <?php echo $sf_params->get('name') ?></li>
	<li>Email : <?php echo $sf_params->get('email') ?></li>
</ul>

<p>Le message est le suivant : </p>
<p><?php echo $sf_params->get('message') ?></p>