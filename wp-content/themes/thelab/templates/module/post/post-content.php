<?php global $post; ?>
<?php $item_link = get_post_meta($post->ID,'_jlfoundation_news_item_link',1); ?>

<div class="post-content">

	<div class="container">
		<div class="post-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<?php if (!empty($item_link)) : ?>
						<?php the_excerpt(); ?>
						<p><a href="<?php echo $item_link; ?>" target="_blank"><?php echo $item_link; ?></a></p>
					<?php else: ?>
						<?php the_content(); ?>
					<?php endif ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="page-content__pagination">
			<a class="page-content__pagination--btn btn-previous"><i class="icon icon-arrow-long-left"></i> Previous</a>
			<a class="page-content__pagination--btn btn-next">Next <i class="icon icon-arrowlong"></i></a>
			<div class="clearfix"></div>
		</div>

	</div><!--/.container-->

</div><!--/.page-content-->