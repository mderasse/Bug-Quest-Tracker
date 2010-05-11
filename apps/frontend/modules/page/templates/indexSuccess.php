<h1>Peanut pages List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Content</th>
      <th>Excerpt</th>
      <th>Author</th>
      <th>Status</th>
      <th>Type</th>
      <th>Slug</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($peanut_pages as $peanut_page): ?>
    <tr>
      <td><a href="<?php echo url_for('page/show?id='.$peanut_page->getId()) ?>"><?php echo $peanut_page->getId() ?></a></td>
      <td><?php echo $peanut_page->getTitle() ?></td>
      <td><?php echo $peanut_page->getContent() ?></td>
      <td><?php echo $peanut_page->getExcerpt() ?></td>
      <td><?php echo $peanut_page->getAuthor() ?></td>
      <td><?php echo $peanut_page->getStatus() ?></td>
      <td><?php echo $peanut_page->getType() ?></td>
      <td><?php echo $peanut_page->getSlug() ?></td>
      <td><?php echo $peanut_page->getCreatedAt() ?></td>
      <td><?php echo $peanut_page->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('page/new') ?>">New</a>
