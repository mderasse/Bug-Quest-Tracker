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
      <td class="columns2"><?php echo $quest->getStatus()->getName() ?></td>
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
         <th class="table-id">Author</th>
         <th class="table-name">Message</th>
     </tr>
  </thead>
  <tbody>
    <tr>
      <td class="columns1">Mystick<br />Wednesday 25 August, At 1h55 AM</td>
      <td class="columns2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
    </tr>
    <tr>
      <td class="columns1">Mystick<br />Wednesday 25 August, At 1h55 AM</td>
      <td class="columns2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
    </tr>
  </tbody>
</table>
</div>
