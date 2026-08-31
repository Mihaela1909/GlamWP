<?php get_header(); ?>

<?php
$site_content = get_posts( array(
	'post_type'      => 'site_content',
	'posts_per_page' => 1,
) );
$content_id = ! empty( $site_content ) ? $site_content[0]->ID : null;
?>

<!-- ============ HERO ============ -->
<section class="hero" <?php if ( $content_id && get_field( 'hero_image', $content_id ) ) : ?>
	style="background-image: url('<?php echo esc_url( get_field( 'hero_image', $content_id )['url'] ); ?>');"
<?php endif; ?>>
	<div class="hero-content">
		<h1><?php echo $content_id ? esc_html( get_field( 'hero_headline', $content_id ) ) : 'Everyday glam, made simple'; ?></h1>
		<div class="hero-buttons">
			<a class="btn btn-shop" href="<?php echo $content_id ? esc_url( get_field( 'shop_button_link', $content_id ) ) : '#'; ?>">
				<?php echo $content_id ? esc_html( get_field( 'shop_button_text', $content_id ) ) : 'Shop now'; ?>
			</a>
			<a class="btn btn-blog" href="<?php echo $content_id ? esc_url( get_field( 'blog_button_link', $content_id ) ) : '#'; ?>">
				<?php echo $content_id ? esc_html( get_field( 'blog_button_text', $content_id ) ) : 'Read blog'; ?>
			</a>
		</div>
	</div>
</section>

<!-- ============ BRAND MESSAGE ============ -->
<section class="brand-message">
	<span class="sparkle sparkle-left">✦</span>
	<p><?php echo $content_id ? nl2br( esc_html( get_field( 'brand_message', $content_id ) ) ) : 'At glam, you can find anything.<br>Whether you are a beginner or a pro, clean or messy.'; ?></p>
	<span class="sparkle sparkle-right">✦</span>
</section>

<!-- ============ BESTSELLERS ============ -->
<section class="bestsellers">
	<h2>Bestsellers</h2>
	<div class="product-grid">
		<?php
		$bestsellers = new WP_Query( array(
			'post_type'      => 'product', // adjust to your actual shop CPT slug
			'posts_per_page' => 4,
			'orderby'        => 'date',
		) );
		if ( $bestsellers->have_posts() ) :
			while ( $bestsellers->have_posts() ) : $bestsellers->the_post();
				?>
				<a class="product-card" href="<?php the_permalink(); ?>">
					<div class="product-thumb"><?php the_post_thumbnail( 'medium' ); ?></div>
					<p class="product-name"><?php the_title(); ?></p>
					<p class="product-price"><?php echo esc_html( get_field( 'price' ) ); ?> kr</p>
				</a>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No products yet.</p>';
		endif;
		?>
	</div>
	<p class="see-more"><a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>">see more &gt;</a></p>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="testimonials">
	<h2>What users think</h2>
	<div class="testimonial-grid">
		<?php
		$testimonials = new WP_Query( array(
			'post_type'      => 'testimonial',
			'posts_per_page' => 3,
			'orderby'        => 'date',
		) );
		if ( $testimonials->have_posts() ) :
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				$photo = get_field( 'photo' );
				?>
				<div class="testimonial-card">
					<div class="testimonial-header">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="avatar"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
						<?php else : ?>
							<div class="avatar avatar-placeholder"></div>
						<?php endif; ?>
						<span class="sender-name"><?php the_title(); ?></span>
					</div>
					<p class="quote"><?php echo esc_html( get_field( 'quote' ) ); ?></p>
					<?php if ( $photo ) : ?>
						<div class="testimonial-photo">
							<img src="<?php echo esc_url( $photo['url'] ); ?>" alt="">
						</div>
					<?php endif; ?>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No testimonials yet.</p>';
		endif;
		?>
	</div>
</section>

<!-- ============ FROM OUR BLOG ============ -->
<section class="blog-teaser">
	<h2>From our blog</h2>
	<div class="blog-grid">
		<?php
		$latest_posts = new WP_Query( array(
			'post_type'      => 'post',
			'posts_per_page' => 2,
			'orderby'        => 'date',
		) );
		if ( $latest_posts->have_posts() ) :
			while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
				?>
				<a class="blog-card" href="<?php the_permalink(); ?>">
					<div class="blog-thumb"><?php the_post_thumbnail( 'medium' ); ?></div>
					<h3><?php the_title(); ?></h3>
					<p class="blog-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 10 ) ); ?></p>
					<p class="blog-date"><?php echo esc_html( get_the_date() ); ?></p>
				</a>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No blog posts yet.</p>';
		endif;
		?>
	</div>
</section>

<?php get_footer(); ?>