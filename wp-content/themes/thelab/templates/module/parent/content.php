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
							
							<!-- Education -->
							<?php $collapse_heading = get_post_meta($post->ID,'_thelab_collapse_heading',1); ?>
							<?php $entries = get_post_meta( get_the_ID(), '_thelab_child_repeat_group', true );?>
							<!-- Our Center -->
							<?php $center_heading = get_post_meta($post->ID,'_thelab_center_section_heading',1); ?>
							<?php $entries_center = get_post_meta( get_the_ID(), '_thelab_center_repeat_group', true );?>

								
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
													<?php if (!empty($collapse_cta_url)) { ?>
														<a class="panel-collapse__link" href="<?php echo $collapse_cta_url;?>"><?php echo $collapse_cta_label; ?></a><i class="icon icon-arrow-long-right"></i>
													<?php } else { ?>
														<small><?php echo $collapse_cta_label; ?></small>
													<?php } ?>
												</div>
											</div><!--/.panel-->
											
										<?php } ?> <!-- end foreach-->

									</div><!--/#accordion-->
								
								<?php } ?><!-- endif !empty $entries -->

								<?php if (!empty($entries_center)) { ?>
								
									<h3><?php echo $center_heading; ?></h3>
									
									<div class="row">
										<?php $count = 0; ?>
										<?php foreach ( (array) $entries_center as $key => $entry ) {
											$count++;
										    $center_name = $center_description = $center_role = $center_link = $center_email = $center_phone = $center_image = '';

										    if ( isset( $entry['_thelab_center_name'] ) )
										        $center_name = esc_html( $entry['_thelab_center_name'] );

										    if ( isset( $entry['_thelab_center_link'] ) )
										        $center_link = esc_html( $entry['_thelab_center_link'] );

										    if ( isset( $entry['_thelab_center_role'] ) )
										        $center_role = esc_html( $entry['_thelab_center_role'] );

										    if ( isset( $entry['_thelab_center_description'] ) )
										        $center_description = $entry['_thelab_center_description'];

										    if ( isset( $entry['_thelab_center_phone'] ) )
										        $center_phone = $entry['_thelab_center_phone'];

										    if ( isset( $entry['_thelab_center_email'] ) )
										        $center_email = $entry['_thelab_center_email'];

										    if ( isset( $entry['_thelab_center_image_id'] ) )
										    	$center_image = wp_get_attachment_image( $entry['_thelab_center_image_id'], 'share-pick', null, array(
										        'class' => 'center_thumb',
										    ) );
										    ?>


											<div class="col-md-6 panel-center">
												<div class="panel" role="tab" id="heading-<?php the_ID(); ?>-<?php echo $count; ?>">
													<?php echo $center_image; ?>
													<h5 class="center-name">
														<?php if (!empty($center_link)): ?>
															<a href="<?php echo $center_link?>";"><?php echo $center_name; ?></a>
															<span class="center-role"><?php echo $center_role; ?></span>
														<?php else: ?>
															<?php echo $center_name; ?>
															<span class="center-role"><?php echo $center_role; ?></span>
														<?php endif ?>
													</h5>
													<p class="center-description small"><?php echo $center_description; ?></p>
													<p class="center-details small">Office: <a href="tel://<?php echo $center_phone; ?>"><?php echo $center_phone; ?></a><br>
													Email: <a href="mailto:<?php echo $center_email; ?>"><?php echo $center_email; ?></a></p>
												</div>
											</div><!--/.col-->
											
										<?php } ?> <!-- end foreach-->

									</div><!--/.row-->
								
								<?php } ?><!-- endif !empty $entries -->
								
							</div><!--/.page_content-section-->
					
						<?php endwhile; ?>
					
					</div><!--/.page_content-entry-->

				<?php endif; wp_reset_query(); ?>

				<?php $pagination = $thelab_theme->child_nav_pagination(); ?>

				<?php
					$page_id = get_post_meta($post->ID,'_thelab_home_next_id',1);
					$page_data = get_page( $page_id );
					$title = $page_data->post_title;
					$link = get_permalink($page_data);
					$excerpt = get_post_meta($page_id,'_thelab_home_hero_text',1);
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_data->ID ), 'index-post-thumbnail-large' );
				?>

				<?php if (!empty( $pagination['next']) ): ?>

					<div class="page-nav page-nav--single">

						<div class="nav-block" style="background-image: url('<?php echo $image[0]; ?>')">
							<div class="nav-block__content">
								<div class="nav-block__header">
									<h4 class="nav-block--title"><?php echo $title;?></h4>
									<p class="nav-block--text"><?php echo $excerpt;?> <i class="icon icon-arrow-long-right"></i></p>
								</div>
							</div><!--./nav-block__content-->
							<a href="<?php echo $link; ?>" class="nav-block--link"></a>

						</div><!--/.nab-block-->	

						<?php get_template_part('templates/module/parent/content','footer'); ?>

					</div><!--/.page-nav-->

				<?php endif; ?>

			</article>

</div><!-- /container -->
<?php get_template_part('templates/module/section','sidebar'); ?>