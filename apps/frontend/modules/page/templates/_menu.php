<?php
  foreach($roots as $root):
    include_partial('page/node', array('node' => $root));
  endforeach;
 ?>