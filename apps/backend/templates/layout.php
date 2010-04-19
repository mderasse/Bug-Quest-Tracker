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
  		  <h1 class="grid_4 padding alignCenter"><img src="/images/login/logo.png" alt="Peanut, un CMS à base de symfony" /></h1>
  		  
  		  <div id="form" class="padding grid_4">
  				<?php echo $sf_content ?>
  			</div>
			</div>
			
		</div>
		
	<?php else: ?>
	
    <?php echo $sf_content ?>
    
  <?php endif; ?>
  </body>
</html>
