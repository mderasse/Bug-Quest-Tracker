<table class="jobs">
  <?php foreach ($quest as $i => $quest): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php echo $quest->getId() ?>
      </td>
      <td class="position">

      </td>
      <td class="company">

      </td>
    </tr>
  <?php endforeach; ?>
</table>
