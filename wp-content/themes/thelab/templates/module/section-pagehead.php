<?php if(is_page_template('template-home.php')):
	$page_title = get_post_meta($post->ID,'_jlfoundation_page_title',1);
	else :
	$page_title = get_post_meta($post->ID,'_jlfoundation_page_intro',1);
	endif
?>
<?php $page_subtitle = get_post_meta($post->ID,'_jlfoundation_page_subtitle',1); ?>
<?php $page_details = get_post_meta($post->ID,'_jlfoundation_page_details',1); ?>
<?php $page_whitman_caption = get_post_meta($post->ID,'_jlfoundation_page_whitman_caption',1); ?>
<?php $page_whitman_title = get_post_meta($post->ID,'_jlfoundation_page_whitman_title',1); ?>
<?php $page_whitman_details = get_post_meta($post->ID,'_jlfoundation_page_whitman_details',1); ?>
<?php $child_page_intro = get_post_meta($post->ID,'_jlfoundation_child_page_intro',1); ?>


<?php if ( is_page() && $post->post_parent > 0 ) { ?>
<div class="page-head">
	<div class="container">
		<div class="page-header">
			<span class="page-header--subtitle"><?php the_title(); ?></span>
			<h2 class="page-header--intro"><?php echo wpautop($child_page_intro); ?></h2>
		</div>
	</div>
</div>

<?php } else { ?>

<div class="page-head">
	<div class="container">
		<div class="page-header">
			<span class="page-header--subtitle"><?php echo $page_subtitle; ?></span>
			<h2 class="page-header--intro"><?php echo wpautop($page_title); ?></h2>
			<?php if(!empty($page_details)): ?>
				<div class="page-header--details">
					<?php echo wpautop($page_details); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php } ?>

<?php if (is_page('31')) { ?>
	<div class="page-head__image">
		<?php the_post_thumbnail('full',array('class'=>'img-responsive page-head__image--img')); ?>
	</div>
	<span class="page-header--caption"><?php echo wpautop($page_whitman_caption); ?></span>
	<div class="page-head">
		<div class="container">
			<h2 class="page-header--intro"><?php echo $page_whitman_title; ?></h2>
			<div class="page-header--details">
				<?php echo wpautop($page_whitman_details); ?>
			</div>
		</div>
	</div>
<?php } ?>