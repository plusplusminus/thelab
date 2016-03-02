<?php global $post; ?>
<div class="nav-block nav-block--foundation <?php echo 'page-id-'.$post->ID; ?> <?php if ($post->old == $post->ID) echo "active"; ?>">
	<div class="nav-block--row">
		<div class="nav-block__content">
			<div class="nav-block__header">
				<?php $title = get_post_meta($post->ID,'_jlfoundation_short_title',true); ?>
				<?php $title = empty($title) ? get_the_title() : $title; ?>
				<h3 class="nav-block__title"><?php echo $title; ?></h3>
			</div>
		</div>
	</div>
	<a href="<?php the_permalink();?>" title="" class="nav-block--link"></a>
</div>
