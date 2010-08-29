<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php use_javascript('jquery-1.4.2.min.js') ?>
    <?php use_javascript('search.js') ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div id="topbox">
      <?php if($sf_user->isAuthenticated()): ?>
      Welcome <?php echo $sf_user->getGuardUser()->getUsername() ?><br /><br />
      <a href="<?php echo url_for('@editprofil') ?>" >Profile</a> - <a href="<?php echo url_for('@sf_guard_signout') ?>" >Logout</a>
      <?php else: ?>
        <?php include_component('sfGuardAuth', 'loginfast') ?>
      <?php endif; ?>
    </div>
    <div id="top">
      <div class="searchbox">
        <form action="<?php echo url_for('quest_search') ?>" method="get">
        <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" /><input type="submit" value="" name="search">
        <img id="loader" src="/images/loader.gif" style="vertical-align: middle; display: none" />

        </form>
      </div>
      <a class="logo" href="<?php echo url_for('@homepage') ?>"><img src="/images/logo.png" alt="logo" /></a>
    </div>
    <div id="content">
      <div id="menu">
        <div id="menu-l">
          <div id="menu-r">
            <div id="menu-c">
              <ul>
                <li><a href="<?php echo url_for('@homepage') ?>">HOME</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=mission') ?>">Mission</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=quest') ?>">Quest</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=elyos') ?>">Elyo</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=asmodian') ?>">Asmodians</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=1') ?>">Worked</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=2') ?>">Broken</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=3') ?>">In Work</a></li>
                <li><a href="<?php echo url_for('@homepage?quest=4') ?>">Untested</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php echo $sf_content ?>
    </div>
    <div id="bottom">Aion LP designed by Seigi. Materials are trademarks and copyrights of NCsoft Corporation.<br />
                     Powered by Mystick for Aion Lightning<br />
       </div>
    
  </body>
</html>
