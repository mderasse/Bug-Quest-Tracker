<h1>Quests List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Type</th>
      <th>Zone</th>
      <th>Race</th>
      <th>Status</th>
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

  <a href="<?php echo url_for('quest/new') ?>">New</a>
