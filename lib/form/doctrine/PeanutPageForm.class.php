<?php

/**
 * PeanutPage form.
 *
 * @package    peanut
 * @subpackage form
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peanutPageForm extends BasepeanutPageForm
{
  public function configure()
  {
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions'=>array(
    	'customConfig'				=> '/js/ckeditor/config.js',
    	'filebrowserBrowseUrl'		=> '/js/filemanager/index.html',
    	'filebrowserImageBrowseUrl'	=> '/js/filemanager/index.html?type=Images',
    )));
  }
}
