<h2 class="helvetica light">Le module contact</h2>

<p><strong>Nom du module : contact<br />
Auteur : Alexandre "pocky" Balmes<br />
Remerciement : symfony <a href="http://www.symfony-project.org/forms/1_4/fr/" title="voir le site">forms in actions</a><br />
Version du module : 1.0</strong></p>

<p>Le module contact vous permet de proposer simplement un formulaire de contact pour votre site Internet.<br />
Par défaut, trois champs sont disponibles :</p>
<ul>
  <li>Un champ Nom</li>
  <li>Un champ Mail</li>
  <li>Un champ Message</li>
</ul>

<p>A ces champs viennent s'ajouter un "captcha" simple permettant de se prévenir d'une certains nombre de spams.</p>
<p>Attention, ce module n'est pas administrable par le backoffice. Il faudra donc en cas de changement à effectuer (dans le choix des champs par exemple) se réferer au tutoriel <a href="http://www.symfony-project.org/forms/1_4/fr/" title="voir le site">forms in actions</a>. L'administration à travers le backoffice sera une fonctionnalité disponible dans une prochaine version</p>

<h2 class="helvetica light">Formulaire de contact</h2>
<p class="notice">Les champs marqués d'une étoile (*) sont obligatoires</p>

<?php if($form->hasErrors()): ?>
<ul class="notification error clearfix">
	<?php if($form['name']->getError()): ?><li><?php echo $form['name']->getError() ?></li><?php endif; ?>
	<?php if($form['email']->getError()): ?><li><?php echo $form['email']->getError()?></li><?php endif; ?>
	<?php if($form['message']->getError()): ?><li><?php echo $form['message']->getError() ?></li><?php endif; ?>
	<?php if($form['captcha']->getError()): ?><li><?php echo $form['captcha']->getError() ?></li><?php endif; ?>
</ul>
<?php endif; ?>

<form action="<?php echo url_for('contact/new.html') ?>" class="cssform" method="POST">

	<fieldset>
	
		<p>
			<?php echo $form['name']->renderLabel('Nom*', array('class' => 'required')) ?><br />
			<?php echo $form['name']->render(array('class' => 'text-input')) ?>
		</p>

		<p>
			<?php echo $form['email']->renderLabel('Adresse mail*', array('class' => 'required')) ?><br />
			<?php echo $form['email']->render(array('class' => 'text-input')) ?>
		</p>

		<p>
			<?php echo $form['message']->renderLabel('Message*', array('class' => 'required')) ?><br />
			<?php echo $form['message']->render(array('class' => 'text-input textarea')) ?>
		</p>	
		
		<p>
			<?php echo $form['captcha']->renderLabel('3 + 4 = ?*', array('class' => 'required')) ?><br />
			<?php echo $form['captcha']->render(array('class' => 'text-input')) ?>
		</p>	
			
		<?php echo $form->renderHiddenFields() ?>
					 
		<input name="Send" type="submit" value="Submit" class="button" id="send" size="16"/>

	</fieldset>
	
</form>
