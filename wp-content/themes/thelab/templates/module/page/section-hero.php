<?php global $post; ?>

<?php $hero_text = get_post_meta($post->ID,'_jlfoundation_parent_hero_text',1); ?>

<header class="hero hero--foundation">
	<div class="hero__image">
		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
	</div>
	
	<?php if (!empty($hero_text)) : ?>
		<div class="hero__heading">
			<h1 class="hero__heading--title"><?php echo wpautop($hero_text) ?></h1>
		</div>
	<?php endif; ?>
	
	<div class="hero--pattern"></div>
</header>