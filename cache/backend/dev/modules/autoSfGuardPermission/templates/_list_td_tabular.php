<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($sf_guard_permission->getName(), 'sf_guard_permission_edit', $sf_guard_permission) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $sf_guard_permission->getDescription() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($sf_guard_permission->getCreatedAt()) ? format_date($sf_guard_permission->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($sf_guard_permission->getUpdatedAt()) ? format_date($sf_guard_permission->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
