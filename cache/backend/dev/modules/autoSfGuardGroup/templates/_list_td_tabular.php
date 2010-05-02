<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($sf_guard_group->getName(), 'sf_guard_group_edit', $sf_guard_group) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $sf_guard_group->getDescription() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($sf_guard_group->getCreatedAt()) ? format_date($sf_guard_group->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($sf_guard_group->getUpdatedAt()) ? format_date($sf_guard_group->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
