<div class="page">Pages : 1 2 3 4 5 6 </div>
<div id="table">
<table>
  <thead>
     <tr>
         <th class="table-id">ID</th>
         <th class="table-name">Quest Name</th>
         <th class="table-status">Status</th>
         <th class="table-zone">Zone</th>
         <th class="table-race">Race</th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($quests as $quest): ?>
    <tr>
      <td><a href="<?php echo url_for('quest/edit?id='.$quest->getId()) ?>"><?php echo $quest->getId() ?></a></td>
      <td><?php echo $quest->getNameId() ?></td>
      <td><?php echo $quest->getType() ?></td>
      <td><?php echo $quest->getZoneId() ?></td>
      <td><?php echo $quest->getRace() ?></td>
      <td><?php echo $quest->getStatusId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
