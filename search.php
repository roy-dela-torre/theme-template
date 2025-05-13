<?php get_header(); ?>
<div class="search-results">
    <?php if (have_posts()) : ?>
        <h2><?php printf(esc_html__('Search Results for: %s', 'template'), '<span>' . get_search_query() . '</span>'); ?></h2>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'prev_text' => __('Previous', 'template'),
                'next_text' => __('Next', 'template'),
            ));
            ?>
        </div>
    <?php else : ?>
        <h2><?php esc_html_e('Nothing Found', 'template'); ?></h2>
        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'template'); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>