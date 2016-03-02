<?php global $post; ?>
<?php global $thelab_theme; ?>

<div id="page" class="page-content">

	<div class="container">
		<div class="page-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div><!--/.container-->

	<?php $pagination = $thelab_theme->child_nav_pagination(); ?>

	<?php if (!empty( $pagination['next']) ): ?>

		<div class="page-content__pagination">

			<?php if ( !empty( $pagination['next'] )) : ?>
				<a href="<?php echo get_permalink($pagination['next']);?>" class="page-content__pagination--btn btn-next"><?php echo get_the_title($pagination['next']);?> <i class="icon icon-arrow-long-right"></i></a>
			<?php endif; ?>
			<div class="clearfix"></div>
		</div>

	<?php endif; ?>

</div><!--/.page-content-->