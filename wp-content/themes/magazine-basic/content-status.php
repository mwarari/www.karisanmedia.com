<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @since 3.0.0
 */
$class = bavotasan_article_class();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
		<header>
			<div class="post-format">Status</div>
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
			<div class="author"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div>
		</header>

		<div class="entry-content">
			<time class="published" datetime="<?php echo get_the_date( 'Y-m-d' ) . 'T' . get_the_time( 'H:i' ) . 'Z'; ?>">
				<?php printf( __( 'Posted on %1$s at %2$s', 'magazine-basic' ), get_the_date(), get_the_time() );	?>
			</time>

			<?php the_content( 'Read more &rarr;' ); ?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'content', 'footer' ); ?>

    </article>