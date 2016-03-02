<?php $child_page_intro = get_post_meta($post->ID,'_jlfoundation_child_page_intro',1); ?>

<div class="page-head">
	<div class="container">
		<div class="page-header">
			<span class="page-header--subtitle"><?php the_title(); ?></span>
			<?php if(!empty($child_page_intro)): ?>
				<h2 class="page-header--intro"><?php echo wpautop($child_page_intro); ?></h2>
			<?php endif ?>
		</div>
	</div>
</div>