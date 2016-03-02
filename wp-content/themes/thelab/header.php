<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<?php global $thelab; ?>
	<?php global $thelab_theme; ?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?></title>

    <!-- typekit -->
	<script src="https://use.typekit.net/cht4ztd.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>	

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>	

	<?php // get_template_part('templates/module/home/section','parralax'); ?>

	<nav class="navbar navbar--main">
		<div class="navbar-logo navbar-logo--left">
			<?php if ( ( '' != $thelab['site_logo']['url'] ) ) {
				$logo_url = $thelab['site_logo']['url'];
				$logo_url_mobile = $thelab['site_logo_mobile']['url'];
				$site_url = get_bloginfo('url');
				$site_name = get_bloginfo('name');
				$site_description = get_bloginfo('description');
				if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
				echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="hidden-md-down" data-pin-no-hover="true" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/><img class="hidden-lg-up" data-pin-no-hover="true" src="'.$logo_url_mobile.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
				
			} // End IF Statement */
			?>
		</div>

		<div class="navbar-logo navbar-logo--right">
			<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#main-nav">
				<!-- &#9776; --><small> Menu</small>
			</button>
			<?php if ( ( '' != $thelab['site_logo_2']['url'] ) ) {
				$logo_2_url = $thelab['site_logo_2']['url'];
				$site_url = get_bloginfo('url');
				$site_name = get_bloginfo('name');
				$site_description = get_bloginfo('description');
				if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
				echo '<a class="hidden-md-down" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="hidden-md-down" data-pin-no-hover="true" src="'.$logo_2_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
				
			} // End IF Statement */
			?>
		</div>
		<div id="main-nav" class="collapse">
			<?php main_nav('main-nav','nav-items'); ?>
		</div>
	</nav>