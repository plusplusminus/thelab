<?php global $post; ?>
<?php global $thelab_theme; ?>

<div id="container" class="page-container intro-effect-sidefixed">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>    
		
			<?php $hero_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
			<?php $hero_text = get_post_meta($post->ID,'_thelab_parent_hero_text',1); ?>
			
			<header class="header">
				<div class="bg-img"><img src="<?php echo $hero_bg;?>" /></div>
			</header>
		
			<article class="content">
				<div class="title hero__heading">
					<p class="hero__heading--subline"><?php the_title();?></p>
					<h1 class="hero__heading--title"><?php echo wpautop($hero_text);?></h1>
					<button class="trigger bounce"><span><i class="fa fa-long-arrow-down"></i></span></button>
				</div>

				<?php
				$thecontent = get_the_content();
				if(!empty($thecontent)) { ?>

					<div class="page-content__entry">
						<?php the_content();?>
					</div>

				<?php } ?> 
		
		<?php endwhile; ?>
	
	<?php endif; ?>
				
			<?php $args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			); ?>
			
			<?php $parent = new WP_Query( $args ); ?>

				<?php if ( $parent->have_posts() ) : ?>
					
					<div class="page-content__entry">
					
						<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
							
							<?php $child_page_intro = get_post_meta($post->ID,'_thelab_child_page_intro',1); ?>
							<?php $collapse_heading = get_post_meta($post->ID,'_thelab_collapse_heading',1); ?>
							<?php $entries = get_post_meta( get_the_ID(), '_thelab_child_repeat_group', true );?>

								
							<div id="section-<?php the_ID(); ?>" class="page-content__section">
								<h4><?php the_title(); ?></h4>
								<?php if (!empty($child_page_intro)) { ?>
									<h2><?php echo $child_page_intro; ?></h2>
								<?php } ?>
								
								<?php the_content(); ?>
								
								<?php if (!empty($entries)) { ?>
								
									<h3><?php echo $collapse_heading; ?></h3>
									
									<div id="accordion">
										<?php $count = 0; ?>
										<?php foreach ( (array) $entries as $key => $entry ) {
											$count++;
										    $collapse_title = $collapse_content = $collapse_cta_label = $collapse_cta_url = '';

										    if ( isset( $entry['_thelab_collapse_title'] ) )
										        $collapse_title = esc_html( $entry['_thelab_collapse_title'] );

										    if ( isset( $entry['_thelab_collapse_content'] ) )
										        $collapse_content = $entry['_thelab_collapse_content'];

										    if ( isset( $entry['_thelab_collapse_cta_label'] ) )
										        $collapse_cta_label = $entry['_thelab_collapse_cta_label'];

										    if ( isset( $entry['_thelab_collapse_cta_url'] ) )
												$collapse_cta_url = $entry['_thelab_collapse_cta_url'];
										    ?>
												
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>-<?php echo $count; ?>">
													<h5 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>-<?php echo $count; ?>"><?php echo $collapse_title; ?> <i class="icon"></i></a>
													</h5>
												</div>
												
												<div id="collapse-<?php the_ID(); ?>-<?php echo $count;?>" class="panel-collapse collapse">
													<?php echo wpautop($collapse_content); ?>
													<?php if (!empty($collapse_cta_label)) { ?>
														<a class="panel-collapse__link" href="<?php echo $collapse_cta_url;?>"><?php echo $collapse_cta_label; ?></a><i class="icon icon-arrow-long-right"></i>
													<?php } ?>
												</div>
											</div><!--/.panel-->
											
										<?php } ?> <!-- end foreach-->

									</div><!--/#accordion-->
								
								<?php } ?><!-- endif !empty $entries -->
								
							</div><!--/.page_content-section-->
					
						<?php endwhile; ?>
					
					</div><!--/.page_content-entry-->

				<?php endif; wp_reset_query(); ?>

				<?php $pagination = $thelab_theme->child_nav_pagination(); ?>

				<?php if (!empty( $pagination['next']) ): ?>

					<div class="page-nav page-nav--single">

						<div class="nav-block" style="background-image: url('http://localhost/thelab/wp-content/uploads/2016/02/explore.jpeg');">
							<div class="nav-block__content">
								<div class="nav-block__header">
									<h4 class="nav-block--title"><?php echo get_the_title($pagination['next']);?></h4>
									<p class="nav-block--text">Text preview for the next page. <i class="icon icon-arrow-long-right"></i></p>
								</div>
							</div><!--./nav-block__content-->
							<a href="<?php echo get_permalink($pagination['next']);?>" class="nav-block--link"></a>

						</div><!--/.nab-block-->	

					</div><!--/.page-nav-->

				<?php endif; ?>

			</article>

</div><!-- /container -->
<?php get_template_part('templates/module/section','sidebar'); ?>