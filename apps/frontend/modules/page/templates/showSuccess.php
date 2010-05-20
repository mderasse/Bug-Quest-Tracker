<?php slot('title', sprintf($peanut_page->getTitle())); ?>

<div class="entry">
  <h2 class="helvetica title light"><?php echo $peanut_page->getTitle(); ?></h2>
  <div class="content">
    <?php echo $peanut_page->getContent(ESC_RAW); ?>
  </div>
</div>