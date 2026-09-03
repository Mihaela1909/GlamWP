<?php get_header(); ?>

<main class="single-post">
	<div class="single-post-container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="single-post-hero">
				<?php
				$post_image = get_field( 'post_image' );
				if ( $post_image ) :
					?>
					<img src="<?php echo esc_url( $post_image['url'] ); ?>" alt="<?php echo esc_attr( $post_image['alt'] ); ?>">
					<?php
				elseif ( has_post_thumbnail() ) :
					the_post_thumbnail( 'large' );
				endif;
				?>
			</div>

			<div class="single-post-body">
				<?php
				$badge_tag = get_field( 'badge_tag' );
				if ( $badge_tag ) :
					?>
					<span class="single-post-badge"><?php echo esc_html( $badge_tag ); ?></span>
				<?php endif; ?>

				<h1>
					<?php
					$post_title_field = get_field( 'post_title_field' );
					echo esc_html( $post_title_field ? $post_title_field : get_the_title() );
					?>
				</h1>

				<?php
				$subtitle = get_field( 'subtitle' );
				if ( $subtitle ) :
					?>
					<p class="single-post-subtitle"><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>

				<div class="single-post-meta">
					<span class="single-post-date"><?php echo esc_html( get_the_date( 'j.n.Y' ) ); ?></span>
					<?php
					$read_time = get_field( 'read_time' );
					if ( $read_time ) :
						?>
						<span class="single-post-readtime"><?php echo esc_html( $read_time ); ?></span>
					<?php endif; ?>
				</div>

				<div class="single-post-text">
					<?php
					$post_text = get_field( 'post_text' );
					if ( $post_text ) :
						echo wp_kses_post( $post_text );
					else :
						the_content();
					endif;
					?>
				</div>
			</div>

		<?php endwhile; endif; ?>

		<p class="back-to-blog">
			<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'front-blog' ) ) ); ?>">&larr; Back to Blog</a>
		</p>
	</div>
</main>

<?php get_footer(); ?>