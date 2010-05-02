<td colspan="4">
  <?php echo __('%%name%% - %%description%% - %%created_at%% - %%updated_at%%', array('%%name%%' => link_to($sf_guard_permission->getName(), 'sf_guard_permission_edit', $sf_guard_permission), '%%description%%' => $sf_guard_permission->getDescription(), '%%created_at%%' => false !== strtotime($sf_guard_permission->getCreatedAt()) ? format_date($sf_guard_permission->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($sf_guard_permission->getUpdatedAt()) ? format_date($sf_guard_permission->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
