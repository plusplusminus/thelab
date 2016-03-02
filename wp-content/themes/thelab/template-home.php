<?php 

/* Template Name: Home */

get_header();
global $post;

?>
<?php // get_template_part('templates/module/gallery'); ?>
<!-- fullPage,js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.7/jquery.fullPage.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#fullpage').fullpage({
			scrollingSpeed: 1000,
			menu: '#sidebarMenu',
			anchors:['asection-5', 'asection-8', 'asection-10' , 'asection-12', 'asection-14']
		});
	});
</script>

<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section">
		<div class="loader-content">
			<h1 class="hero__heading--title">Spaulding-Labuschagne<br><strong>Neuromodulation Center</strong></h1>
			<img src="<?php bloginfo('stylesheet_directory');?>/assets/images/labintro.png" class="img-responsive">
			<p class="hero__heading--subline"><br><img class="loading" src="<?php bloginfo('stylesheet_directory');?>/assets/images/loading.png"></p>
		</div>
	</div>
	<div id="container">
		<button class="trigger" style="display: none;"></button>
	</div>
</div>

<div id="fullpage">

<?php
	// The Query

	$args = array(
	  'post_type' => 'page',
	  'order_by' => 'menu_order',
	  'order' => 'asc',
	  'post__in' => array(12,14,10,8,5)
	);
	$the_query = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$hero_slide_bg = get_post_meta($post->ID,'_thelab_home_hero_bg',1);
				$hero_slide_text = get_post_meta($post->ID,'_thelab_home_hero_text',1);
				$hero_slide_btn_label = get_post_meta($post->ID,'_thelab_home_hero_btn_label',1);
				$hero_slide_btn_url = get_post_meta($post->ID,'_thelab_home_hero_btn_url',1);
				$entries = get_post_meta( get_the_ID(), '_thelab_nav_block_repeat_group', true );
			?>
				<div data-anchor="asection-<?php the_ID();?>" id="section-<?php the_ID();?>" class="section hero" style="background-image:url('<?php echo $hero_slide_bg;?>')">
					<div class="container">
						<div class="hero__row">
							<div class="main">
								<div class="hero__heading">
									<p class="hero__heading--subline"><?php the_title();?></p>
									<h2 class="hero__heading--title"><?php echo wpautop($hero_slide_text); ?></h2>
								</div><!--/.hero__heading-->

								<div class="hero__content">
									<?php if (!empty($hero_slide_btn_label)) { ?>
										<a href="<?php echo $hero_slide_btn_url; ?>" class="hero__btn"><?php echo $hero_slide_btn_label; ?></a>
									<?php }?>
								</div><!--/.hero__content-->
							</div><!--/.main-->
						</div>
					</div>
					
					<div class="container-fluid nav-block--col-<?php echo count($entries);?>">
						<div class="page-nav">
							<?php $count = 0;?>
							<?php foreach ( (array) $entries as $key => $entry ) {
								$count++;
							    $home_nav_title_1 = $home_nav_text_1 = $home_nav_url_1 = '';

							    if ( isset( $entry['_thelab_home_nav_title_1'] ) )
							        $home_nav_title_1 = esc_html( $entry['_thelab_home_nav_title_1'] );

							    if ( isset( $entry['_thelab_home_nav_title_1'] ) )
							        $home_nav_text_1 = $entry['_thelab_home_nav_text_1'];

							    if ( isset( $entry['_thelab_home_nav_title_1'] ) ) {
									$home_nav_url_1 = $entry['_thelab_home_nav_url_1'];
							    } ?>

								<div class="nav-block">
									<div class="nav-block__content">
										<div class="nav-block__header">
											<h4 class="nav-block--title"><?php echo $home_nav_title_1;?></h4>
											<p class="nav-block--text"><?php echo $home_nav_text_1;?> <i class="icon icon-arrow-long-right"></i></p>
										</div>
									</div><!--./nav-block__content-->
									<a href="<?php echo $home_nav_url_1;?>" class="nav-block--link"></a>
								</div><!--/.nab-block-->

							<?php } ?>
						</div><!--/.page-nav-->
					</div><!--/.container-fluid-->
				</div><!--/.section-->
			<?php }
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata(); ?>

</div> <!--/.full-page-->

<?php get_template_part('templates/module/section','sidebar-home'); ?>

<?php  

 get_footer();

?>