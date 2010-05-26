<?php $sf_context->getModuleName() == "page" ? $current =  "current" : $current = null ?>

<li>
	<?php echo link_to(__('pages'), '@peanut_page', array('class' => 'nav-top-item '.$current.'', 'title' => __('pages'))); ?>
	<ul>
		<li><?php echo link_to(__('Show pages'), '@peanut_page'); ?></li>
		<li><?php echo link_to(__('Add new page'), '@peanut_page_new'); ?></li>
	</ul>
</li>