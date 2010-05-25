<?php slot('title', sprintf($peanut_page['title'])); ?>

<div class="entry">
  <h2 class="helvetica title light"><?php echo $peanut_page['title']; ?></h2>
  <div class="content">
    <?php echo htmlspecialchars_decode($peanut_page['content']); ?>
  </div>
</div>