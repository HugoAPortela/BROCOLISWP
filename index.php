<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brocoliswp
 */

get_header();
?>

<img src="<?php header_image(); ?>" class="img-responsive">

    <div id="site-info">
        <h2 class="big-title">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Vivamus comodo tempor est ipsum dolor</h2>
        <strong>Design</strong>
        <p>Suspendisse non augue sapien. Sed purus orci, imperdiet in nunc convallis, gravida auctor ipsum. Pellentesque pellentesque, augue vitae vestibulum lacinia, tortor nibh porttitor tortor, non volutpat nisi risus et nulla.</p>
        <strong>Development</strong>
        <p>Nullam nec sodales metus, sit amet dapibus sapien. Cras quis enim vitae orci dignissim vulputate in ac felis. Praesent pellentesque sodales quam. Aenean nunc felis, gravida eget placerat vel, dictum id risus.</p>
        <strong>Branding</strong>
        <p>Suspendisse non augue sapien. Sed purus orci, imperdiet in nunc convallis, gravida auctor ipsum. Pellentesque pellentesque, augue vitae vestibulum lacinia, tortor nibh porttitor tortor, non volutpat nisi risus et nulla.</p>
    </div>

    <div id="portfolio">
        <h2 class="big-title center spaced">Works</h2>
        <?php
            $args = array( 'post_type' => 'work', 'posts_per_page' => 9 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                echo "<article class='box-work'>";
                the_post_thumbnail();
                echo "<div class='meta-work'>";
                    echo "<h3>" . get_the_title() . "</h3>";
                    the_tags('', ',');
                echo "</div>";
                echo "</article>";
            endwhile;
        ?>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <h2 class="big-title center spaced">Blog</h2>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

				echo "<a class='read-more' href='" . get_the_permalink() . "'>Read more <i class='fas fa-arrow-right'></i></a>";

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
