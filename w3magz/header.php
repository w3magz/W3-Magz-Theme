<?php 
defined('ABSPATH') or die();
$template_url = get_bloginfo('template_url').'/'; ?>
<!DOCTYPE html>
<html>
<head>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
	<meta charset="utf-8" />
	<!--[if lt IE 9]>
	<script src="<?php echo $template_url;?>js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<link href="<?php echo $template_url;?>css/normalize.css" rel="stylesheet" />
	<link href="<?php echo $template_url;?>css/foundation.css" rel="stylesheet" />
	
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<?php wp_head();?>
	<link href="<?php echo $template_url;?>style.css" rel="stylesheet" />
</head>
<body <?php body_class();?>>
	<header id="header">
		<div id="header-wrapper">
			<h1 id="logo"><a href="<?php echo site_url('/');?>" title="<?php bloginfo('name');?>"><img src="<?php echo $template_url;?>images/logo.png" alt="<?php bloginfo('name');?>" /></a></h1>
			<nav id="top-menu">
				<?php
					$args               = Array('menu'=>'Top Menu',
					'container_id'	    =>'top-nav',
					'theme_location'    =>'top'
					);
					wp_nav_menu($args);
				?>
			</nav>
			<nav id="category-menu">
				
					<?php
					$args = Array('menu'=>'Primary Menu',
								'container_id'  =>'primary-nav',
								'theme_location'=>'primary'
						);
						wp_nav_menu($args);
					?>
					
				
			</nav>
		</div>
	</header>
	<div id="pathway">
		<div class="row">
			<?php
				if(function_exists('takien_breadcrumb')) {
					echo takien_breadcrumb();
				}
			?>
		</div>
	</div>
	<div id="top-banner">
		<img src="<?php echo $template_url;?>/images/top-banner.jpg" alt=""/>
	</div>
	
	<div id="middle">
	