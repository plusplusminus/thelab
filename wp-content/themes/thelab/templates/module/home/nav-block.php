<?php global $post; ?>
<div class="nav-block nav-block--foundation <?php echo 'page-id-'.$post->ID; ?>">
	<div class="nav-block--home">
		<div class="nav-block__content">
			<div class="nav-block__header">
				<?php $title = get_post_meta($post->ID,'_jlfoundation_short_title',true); ?>
				<?php $title = empty($title) ? get_the_title() : $title; ?>
				<h3 class="nav-block__title"><?php echo $title; ?></h3>
			</div>
			<div class="nav-block__text">
				<?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
			</div>
		</div>
		<div class="nav-block__image">
			<span class="nav-block__image--btn">Read More <i class="icon icon-arrowright"></i></span>
		</div>
	</div>
	<a href="<?php the_permalink();?>" title="" class="nav-block--link"></a>
</div>