<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $peanut_page->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $peanut_page->getTitle() ?></td>
    </tr>
    <tr>
      <th>Content:</th>
      <td><?php echo $peanut_page->getContent() ?></td>
    </tr>
    <tr>
      <th>Excerpt:</th>
      <td><?php echo $peanut_page->getExcerpt() ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $peanut_page->getAuthor() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $peanut_page->getStatus() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $peanut_page->getType() ?></td>
    </tr>
    <tr>
      <th>Slug:</th>
      <td><?php echo $peanut_page->getSlug() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $peanut_page->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $peanut_page->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('page/edit?id='.$peanut_page->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('page/index') ?>">List</a>
