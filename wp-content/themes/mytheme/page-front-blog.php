<?php
/**
 * Template Name: FrontBlog Page
 */
get_header();
?>

<main class="page-front-blog">
	<div class="front-blog-page-header container">
		<h1>Hottest Trends</h1>

		<div class="blog-filter">
			<button id="filter-toggle" class="btn filter-btn">Filter &gt;</button>
			<ul id="filter-list" class="filter-dropdown" hidden>
				<li><a href="#" data-category="0">All</a></li>
				<?php
				$categories = get_categories( array( 'hide_empty' => true ) );
				foreach ( $categories as $cat ) :
					?>
					<li><a href="#" data-category="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
					<?php
				endforeach;
				?>
			</ul>
		</div>
	</div>

	<div id="front-blog-page-grid" class="front-blog-page-grid container">
		<?php
		$paged = 1;
		$blog_query = new WP_Query( array(
			'post_type'      => 'post',
			'posts_per_page' => 6,
			'paged'          => $paged,
		) );

		if ( $blog_query->have_posts() ) :
			while ( $blog_query->have_posts() ) : $blog_query->the_post();
				get_template_part( 'template-parts/blog-card' );
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No blog posts yet.</p>';
		endif;
		?>
	</div>

	<?php if ( $blog_query->max_num_pages > 1 ) : ?>
		<p class="load-more-wrap">
			<button id="load-more-btn" class="btn load-more-btn"
				data-page="1"
				data-max-pages="<?php echo esc_attr( $blog_query->max_num_pages ); ?>"
				data-category="0">
				Load more
			</button>
		</p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>