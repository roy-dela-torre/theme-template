<?php get_header();
$img_path = get_template_directory_uri() . '/assets/img';
?>
<section class="banner">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="content">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, ducimus.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt molestiae quae pariatur autem consequuntur necessitatibus maiores corporis, quo voluptatem eum facilis possimus, impedit ducimus in assumenda veniam veritatis earum minus hic ab aut. Autem repudiandae, molestiae officia est, doloremque odit beatae exercitationem nobis provident quasi unde. Laudantium dicta minus, tenetur eos eum recusandae cupiditate maxime magni debitis, animi cumque. Voluptatibus doloremque iusto consequatur culpa libero eligendi non sunt incidunt natus quo? Distinctio explicabo illum rem voluptates ea! Aspernatur soluta in numquam beatae eligendi debitis voluptas non deserunt ad necessitatibus. Tempore blanditiis rerum culpa unde eaque minima maiores error numquam qui.</p>
                    <img loading="lazy" src="<?= $img_path; ?>/0803-ADI280647000011-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blos">
    <div class="wrapper">
        <div class="containe-fluid">
            <div class="row">
                <?php
                global $paged;
                $curpage = $paged ? $paged : 1;
                $args = array(
                    'post_type'        => 'post',
                    'posts_per_page'   => -1,
                    'post_status'        => 'publish',
                    'order' => 'DESC',
                    'paged' => $paged,
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $img = the_post_thumbnail_url(the_ID(), 'full');
                        $title = the_title();
                        $link = the_permalink();
                        $id = the_ID();
                        $excerpt = the_excerpt();


                        $data = array(
                            'img' => $img,
                            'title' => $title,
                            'link' => $link,
                            'id' => $id,
                            'excerpt' => $excerpt,
                        );
                        ob_start();
                ?>
                        <div class="col-lg-4 col-md-6">
                            <?php echo get_template_part('template/blog_cards', null, $data); ?>
                        </div>
                <?php
                        $content = ob_get_clean();
                        echo $content;
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>