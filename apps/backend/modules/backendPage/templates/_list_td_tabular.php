<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($peanut_page->getId(), 'backendPage/edit', $peanut_page) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <span class="<?php echo $peanut_page->getNode()->isLeaf() ? 'file' : 'folder' ?>">
    <?php echo $peanut_page->getTitle() ?>
  </span>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_author">
  <?php echo $peanut_page->getSfGuardUser() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_status">
    <?php echo $peanut_page->getStatus() ?>
</td>
