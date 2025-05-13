<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <header class="page-header">
        <h1 class="page-title">
            <?php the_archive_title(); ?>
        </h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
    </header>
    <div class="archive-posts">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    <div class="archive-navigation">
        <?php the_posts_navigation(); ?>
    </div>
<?php else : ?>
    <div class="no-posts">
        <h2><?php esc_html_e('Nothing Found', 'template'); ?></h2>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'template'); ?></p>
    </div>
<?php endif; ?>
<?php get_footer(); ?>