<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <header class="archive-header">
        <h1 class="archive-title">
            <?php single_term_title(); ?>
        </h1>
        <?php if (term_description()) : ?>
            <div class="archive-meta"><?php echo term_description(); ?></div>
        <?php endif; ?>
    </header>
    <div class="taxonomy-posts">
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
    <div class="pagination">
        <?php the_posts_pagination(); ?>
    </div>
<?php else : ?>
    <p><?php esc_html_e('No posts found.', 'template'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>