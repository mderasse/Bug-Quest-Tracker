<?php foreach($peanut_pages as $item): ?>
  <li class="uppercase floatLeft"><a href="<?php echo url_for('page', array('slug' => $item['slug'], 'sf_format' => 'html')); ?>"><?php echo $item['excerpt']; ?></a></li>
<?php endforeach; ?>