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
      <div class="searchbox"><input type="text" name="search"><input type="submit" value="" name="search"></div>
      <div class="logo"><a href="index.php"></a></div>
    </div>
    <div id="content">
      <div id="menu">
        <div id="menu-l">
          <div id="menu-r">
            <div id="menu-c">
              <ul>
                <li>HOME</li>
                <li>Mission</li>
                <li>Quest</li>
                <li>Elyo</li>
                <li>Asmodians</li>
                <li>Admin</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php echo $sf_content ?>
    </div>
    <div id="bottom">Aion LP designed by Seigi. Materials are trademarks and copyrights of NCsoft Corporation.<br />
                     Powered by Mystick for Aion Lightning<br />
    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/fr/"><img alt="Contrat Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/2.0/fr/80x15.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" property="dc:title">Bug Quest Tracker</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="www.eternal-dream.fr" property="cc:attributionName" rel="cc:attributionURL">Matthieu 'Mystick' Derasse - Eternal-Dream</a> est mis à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.0/fr/">licence Creative Commons Paternité - Pas d'Utilisation Commerciale - Pas de Modification 2.0 France</a>.<br />Basé(e) sur une oeuvre à <a xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://github.com/Mystick/Bug-Quest-Tracker" rel="dc:source">github.com</a>.<br />Les autorisations au-delà du champ de cette licence peuvent être obtenues à <a xmlns:cc="http://creativecommons.org/ns#" href="www.eternal-dream.fr" rel="cc:morePermissions">www.eternal-dream.fr</a>.
       </div>
    
  </body>
</html>
