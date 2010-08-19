<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_new">
      <?php echo link_to(__('Ajouter enfant', array(), 'messages'), 'backendPage/ListNew?id='.$peanut_page->getId(), array()) ?>
    </li>
    <?php echo $helper->linkToEdit($peanut_page, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($peanut_page, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?> <br />
    <li class="sf_admin_action_up">
      <?php echo link_to(__('Up', array(), 'messages'), 'backendPage/up?id='.$peanut_page->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_down">
      <?php echo link_to(__('Down', array(), 'messages'), 'backendPage/down?id='.$peanut_page->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_make_root">
      <?php echo link_to(__('Make root', array(), 'messages'), 'backendPage/makeRoot?id='.$peanut_page->getId(), array()) ?>
    </li>
  </ul>
</td>