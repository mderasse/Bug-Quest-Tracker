<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    
    
    <title>
      <?php if (!include_slot('title')): ?>
        peanut :: another CMS on symfony
      <?php endif; ?>
    </title>
    
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body class="helvetica">
    <div class="container_12 alignCenter center">
      
      <div id="header" class="alignLeft clearfix">
        <h1 class="helvetica bold condensed grid_4 padding"><a href="<?php echo url_for('@homepage') ?>" title="Retour à l'accueil">peanut</a></h1>
        <ul class="menu grid_8">
          <?php include_component('page', 'menu') ?>
          <?php include_component('contact', 'menu') ?>
        </ul>
      </div>
      
      <div id="content" class="alignLeft">
        <?php echo $sf_content ?>
      </div>
      
      <div id="footer">
        <p class="light">Ce site utilise le CMS <a href="http://dev.pockyworld.com/?s=peanut" title="Voir le site">peanut</a> et <a href="http://www.symfony-project.com" title="Voir le site">symfony</a> !</p>
      </div>
      
    </div>
  </body>
</html>
