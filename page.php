<?php get_header();
//Template Name: Template Name
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; else : ?>
    <h1><?php esc_html_e( 'Page not found', 'template' ); ?></h1>
<?php endif; ?>
<?php get_footer(); ?>