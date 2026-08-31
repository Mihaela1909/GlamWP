<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
	<div class="container">
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo get_theme_file_uri( 'assets/glam.png' ); ?>" alt="Glam" style="height: 40px;">
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>">Shop</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a></li>
				<li><a href="#">About</a></li>
			</ul>
		</nav>
		<div class="cart">Cart</div>
	</div>
</header>
