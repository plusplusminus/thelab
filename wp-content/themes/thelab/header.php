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

	<!-- Bugherd -->
	<script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=vcqxkmagxupqxpte2brq1w';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
	</script>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
    
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
				echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="hidden-md-down" data-pin-no-hover="true" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/><img class=" img-responsive hidden-lg-up" data-pin-no-hover="true" src="'.$logo_url_mobile.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
				
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