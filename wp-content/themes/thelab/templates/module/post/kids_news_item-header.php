<?php global $jlfoundation_theme; ?>
<?php $meta1 = get_post_meta($post->ID,'_jlfoundation_kids_news_item_meta_1',1); ?>
<?php $meta2 = get_post_meta($post->ID,'_jlfoundation_kids_news_item_meta_2',1); ?>

<div class="post-head">

	<div class="container">
		
		<?php  $jlfoundation_theme->kids_news_menu('kids-news-type'); ?>

	</div>

	<div class="post-header">

		<div class="container">
			<?php $categories = get_categories('');
				foreach($categories as $category) {
					$cat =  $category->category_nicename;
				}
			 ?>
			<div class="post-header--meta meta--<?php echo $cat; ?>"><?php the_time( get_option( 'date_format' ) ); ?></div>
			<h2 class="post-header--title"><?php the_title(); ?></h2>
			<div class="post-header--details">
				<?php if (!empty($meta1)) : ?><span class="details--author"><?php echo $meta1; ?></span><?php endif ?> <?php if (!empty($meta2)) : ?>| <span class="details--role"><?php echo $meta2; ?></span><?php endif ?>
			</div>
		</div>

	</div>
</div>