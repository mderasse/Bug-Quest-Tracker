
<?php if ($pager->haveToPaginate()): ?>
  <div class="page"> Pages :
    <?php //  I Forgot the Systeme Pager for view every Page ?>
  </div>
<?php endif; ?>
<div id="table">
<table>
  <thead>
     <tr>
         <th class="table-id">ID</th>
         <th class="table-name">Quest Name</th>
         <th class="table-status">Type</th>
         <th class="table-zone">Zone</th>
         <th class="table-race">Race</th>
         <th class="table-race">Status</th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $quest): ?>
    <tr style="background-color:<?php echo $quest->getStatus()->getColors() ?>" >
      <td><a href="<?php echo url_for('quest/edit?id='.$quest->getId()) ?>"><?php echo $quest->getId() ?></a></td>
      <td><?php echo $quest->getTranslate()->getNameFr() ?></td>
      <td><?php echo $quest->getType() ?></td>
      <td><?php echo $quest->getZone()->getNameFr() ?></td>
      <td><?php echo $quest->getRace() ?></td>
      <td><?php echo $quest->getStatus()->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<?php if ($pager->haveToPaginate()): ?>
  <div class="page"> Pages :
    <?php //  I Forgot the Systeme Pager for view every Page ?>
  </div>
<?php endif; ?>
