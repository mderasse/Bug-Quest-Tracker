<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body <?php echo !$sf_user->isAuthenticated() ? 'id="login"' : null ?> class="arial">
	
	<?php if(!$sf_user->isAuthenticated()): ?>
	
	  <div class="container_12 alignCenter center">
		
		  <div id="containerIn" class="prefix_2 alignLeft clearfix">
  		  <h1 class="grid_4 padding alignCenter"><a href="<?php echo url_for('@homepage', true); ?>" title="<?php echo __('Homepage'); ?>" /><img src="/images/login/logo.png" alt="Peanut, un CMS à base de symfony" /></a></h1>
  		  
  		  <div id="form" class="padding grid_4">
  				<?php echo $sf_content ?>
  			</div>
			</div>
			
		</div>
		
	<?php else: ?>
	
	<div id="container" class="clearfix">
  	<div id="sidebar" class="floatLeft">
  	  <h1><a href="<?php echo url_for('@homepage', true); ?>" title="<?php echo __('Homepage'); ?>" /><img src="/images/backend/logo.png" alt="Peanut, un CMS à base de symfony" /></a></h1>
  	  
  	  <ul class="alignRight">   
  	    <li><a href="#" title="#"><?php echo __('Gestion des utilisateurs'); ?></a>
  	      <ul>
  	        <li><a href="#" title="#"><?php echo __('Voir les utilisateurs'); ?></li></a>
  	        <li><a href="#" title="#"><?php echo __('Ajouter un utilisateur'); ?></li></a>
  	      </ul>
  	    </li>
  	      
  	    <li><a href="#" title="#"><?php echo __('Gestion des groupes'); ?></a>
  	      <ul>
  	        <li><a href="#" title="#"><?php echo __('Voir les groupes'); ?></li></a>
  	        <li><a href="#" title="#"><?php echo __('Ajouter un groupe'); ?></li></a>
  	      </ul>
  	    </li>
  	    
  	    <li><a href="#" title="#"><?php echo __('Gestion des permissions'); ?></a>
  	      <ul>
  	        <li><a href="#" title="#"><?php echo __('Voir les permissions'); ?></li></a>
  	        <li><a href="#" title="#"><?php echo __('Ajouter une permission'); ?></li></a>
  	      </ul>
  	    </li>
  	  </ul>
  	</div>
  	
  	<div id="content">
  	  
  	  <div id="header">
  	  </div>
  	  
      <?php echo $sf_content ?>
    </div>
  </div>
  
  <?php endif; ?>
  </body>
</html>
