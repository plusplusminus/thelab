	<?php global $jlfoundation; ?>
	<?php global $jlfoundation_theme; ?>
	<?php if(is_front_page()) : ?>
		<?php
		global $post;
			$image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
			$image_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
			$image_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 
			$image_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
		?>
		<section id="hero" class="top-hero top-parallax" data-bg="<?php echo $image_full[0]; ?>" data-bg-tablet="<?php echo $image_large[0]; ?>" data-bg-mobile="<?php echo $image_large[0]; ?>">

			<!-- HERO TEXT -->
			<div class="top-caption">
				<div class="top-text">
					<div class="top-logo">
						<?php if ( ( '' != $jlfoundation['footer_logo']['url'] ) ) {
						$logo_url = $jlfoundation['footer_logo']['url'];
						$site_url = get_bloginfo('url');
						$site_name = get_bloginfo('name');
						$site_description = get_bloginfo('description');
						if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
							echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img data-pin-no-hover="true" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
							
						} // End IF Statement */
						?>
					</div>
				</div>
			</div>
			<!-- /HERO TEXT -->

		</section>
		
	<?php endif; ?>