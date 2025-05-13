<?php get_header(); ?>
<?php if (have_posts()) : ?>w
<header class="archive-header">
    <h1 class="archive-title"><?php single_cat_title(); ?></h1>
    <?php if (category_description()) : ?>
        <div class="archive-meta"><?php echo category_description(); ?></div>
    <?php endif; ?>
</header>
<div class="category-posts">
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
    <div class="pagination">
        <?php
        the_posts_pagination(array(
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
        ));
        ?>
    </div>
</div>
<?php else : ?>
    <p><?php esc_html_e('No posts found in this category.', 'template'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>