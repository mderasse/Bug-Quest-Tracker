<td colspan="4">
  <?php echo __('%%name%% - %%description%% - %%created_at%% - %%updated_at%%', array('%%name%%' => link_to($sf_guard_group->getName(), 'sf_guard_group_edit', $sf_guard_group), '%%description%%' => $sf_guard_group->getDescription(), '%%created_at%%' => false !== strtotime($sf_guard_group->getCreatedAt()) ? format_date($sf_guard_group->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($sf_guard_group->getUpdatedAt()) ? format_date($sf_guard_group->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
