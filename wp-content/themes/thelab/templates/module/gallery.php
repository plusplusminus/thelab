<?php $entries = get_post_meta( get_the_ID(), '_jlfoundation_slides_repeat_group', true ); ?>

<div class="banner-section">

 	<div class="bx-wrapper">

		<div class="bx-viewport">

			<ul class="bxslider">

				<?php foreach ( (array) $entries as $key => $entry ) { ;

				    $img = $name = $country = $link = '';

				    if ( isset( $entry['title'] ) )
				        $title = esc_html( $entry['title'] );

				    if ( isset( $entry['label'] ) )
				        $label = ( $entry['label'] );

				    if ( isset( $entry['url'] ) )
				        $url = ( $entry['url'] );

				    if ( isset( $entry['image'] ) ) {
					    $img = ($entry['image_id'] );
					    $img_url = wp_get_attachment_image_src( $img , 'full');
					}?>
					<li style="background-image:url(<?php echo($img_url[0]); ?>)">
						<div class="dis-table">
							<div class="dis-table-cell">
							<div class="banner-text">
								<p><?php echo $title; ?></p>
								<a class="link-underline" title="<?php echo $label; ?>" href="<?php echo $url; ?>"><?php echo $label; ?></a> </div>
							</div>
						</div>
					</li>

				<?php } ?>

			</ul>

		</div>

	</div>

</div>