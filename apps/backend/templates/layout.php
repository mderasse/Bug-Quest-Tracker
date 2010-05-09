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
  	    <li><a href="#" class="nav-top-item <?php if($sf_context->getModuleName() == 'sfGuardUser'): echo 'current'; endif; ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Manage users'); ?></a>
  	      <ul>
  	        <li><a href="<?php echo url_for('@sf_guard_user'); ?>" title="<?php echo __('Liens d\'accès') ?>"><?php echo __('Show users'); ?></li></a>
  	        <li><a href="<?php echo url_for('@sf_guard_user_new') ?>" title="<?php echo __('Liens d\'accès') ?>"><?php echo __('Add user'); ?></li></a>
  	      </ul>
  	    </li>
  	      
  	    <li><a href="#" class="nav-top-item <?php if($sf_context->getModuleName() == 'sfGuardGroup'): echo 'current'; endif; ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Manage groups'); ?></a>
  	      <ul>
  	        <li><a href="<?php echo url_for('@sf_guard_group'); ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Show groups'); ?></li></a>
  	        <li><a href="<?php echo url_for('@sf_guard_group_new'); ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Add group'); ?></li></a>
  	      </ul>
  	    </li>
  	    
  	    <li><a href="#" class="nav-top-item <?php if($sf_context->getModuleName() == 'sfGuardPermission'): echo 'current'; endif; ?>" title="<?php echo __('Liens d\'accès') ?>"><?php echo __('Manage permissions'); ?></a>
  	      <ul>
  	        <li><a href="<?php echo url_for('@sf_guard_permission'); ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Show permissions'); ?></li></a>
  	        <li><a href="<?php echo url_for('@sf_guard_permission_new'); ?>" title="<?php echo __('Liens d\'accès'); ?>"><?php echo __('Add permission'); ?></li></a>
  	      </ul>
  	    </li>
  	  </ul>
  	</div>
  	
  	<div id="content">
  	  
  	  <div id="header">
  	    <p class="floatLeft"><?php echo __('Hi').' '.$sf_user->getGuardUser(). __('!') ?></p>
  	    
  	    <ul class="listInline floatRight">
  	      <li><a href="<?php echo url_for('@homepage').'guard/users/'.$sf_user->getGuardUser()->getId().'/edit'; ?>" title="<?php echo __('Edit your profile') ?>" class="picto user"><?php echo __('Edit your profile') ?></a></li>
  	      <li><a href="<?php echo url_for('@sf_guard_signout') ?>" title="<?php echo __('Signout') ?>" class="picto exit"><?php echo __('Signout') ?></a></li>
  	    </ul>
  	    
  	  </div>
  	  
  	  <div id="sfContent">
        <?php echo $sf_content ?>
      </div>
    </div>
  </div>
  
  <?php endif; ?>
  </body>
</html>
