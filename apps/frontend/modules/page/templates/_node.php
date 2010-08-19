<li><a href="<?php echo url_for('page', array('slug' => $node['slug'], 'sf_format' => 'html')); ?>"><?php echo $node['excerpt']; ?></a>
  
  <?php
    if($node->getNode()->hasChildren()):
      $children = $node->getNode()->getChildren(); ?>
      
      <ul>
      <?php
        foreach($children as $child):
          include_partial('page/node', array('node' => $child));
        endforeach;
      ?>
      </ul>
    <?php endif;
  ?>
</li>