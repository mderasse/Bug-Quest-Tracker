<div class="table-show">
<table>
  <tbody>
    <tr>
      <td class="columns1">ID : </td>
      <td class="columns2"><?php echo $quest->getId() ?></td>
    </tr>
    <tr>
      <td class="columns1">Name : </td>
      <td class="columns2"><?php echo $quest->getTranslate()->getNameFr() ?></td>
    </tr>
    <tr>
      <td class="columns1">Status : </td>
      <td class="columns2">
      <?php if($sf_user->hasCredential('ChangeStatus')): ?>
      <form action="<?php echo url_for('quest/update?id='.$sf_params->get('id')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $formquest->renderHiddenFields(true) ?>    
      <?php echo $formquest['status_id'] ?><input type="submit" value="Add Comment" /></form>
      <?php else: ?>
      <?php echo $quest->getStatus()->getName() ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td class="columns1">Location : </td>
      <td class="columns2"><?php echo $quest->getZone()->getNameFr() ?></td>
    </tr>
    <tr>
      <td class="columns1">Type : </td>
      <td class="columns2"><?php echo $quest->getType() ?></td>
    </tr>
    <tr>
      <td class="columns1">Race : </td>
      <td class="columns2"><?php echo $quest->getRace() ?></td>
    </tr>
  </tbody>
</table>
</div>
<div class="table-comment">
<h1>Comments</h1>
<table>
  <thead>
     <tr>
         <th class="table-author">Author</th>
         <th class="table-message">Message</th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($quest->getComments() as $comments): ?>
    <tr>
      <td class="columns1"><?php echo $comments->getUser()->getUsername() ?><br /><?php echo $comments->getCreatedAt() ?></td>
      <td class="columns2"><?php echo $comments->getContent() ?></td>
    </tr>
    <?php endforeach; ?>
    <?php if($sf_user->hasCredential('AddComments')): ?>
    <tr>
      <td class="columns1-add">Your Comments :</td>
      <td class="columns2">
      <form action="<?php echo url_for('quest/createcomments?id='.$sf_params->get('id')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $form->renderHiddenFields(true) ?>    
      <?php echo $form['content'] ?><br /><input type="submit" value="Add Comment" /></form></td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>
