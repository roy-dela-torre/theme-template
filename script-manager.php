<?php

/**
 * Script Manager Template
 * Handles conditional loading of scripts for theme pages.
 */

$theme_uri = get_stylesheet_directory_uri();
$js_path = $theme_uri . '/inc/js/';
?>

<!-- Core Scripts -->
<script src="<?php echo $js_path; ?>jquery.min.js"></script>
<script src="<?php echo $theme_uri; ?>/assets/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo $js_path; ?>functions.js"></script>

<?php if (is_front_page()) : ?>
    <script src="<?php echo $js_path; ?>owl.carousel.min.js"></script>
    <script src="<?php echo $js_path; ?>homepage.js"></script>

<?php elseif (is_page('about-us')) : ?>
    <script src="<?php echo $js_path; ?>owl.carousel.min.js"></script>
    <script src="<?php echo $js_path; ?>about_us.js"></script>

<?php elseif (is_page('curbside-pickup')) : ?>
    <script src="<?php echo $js_path; ?>curbside-pickup.js"></script>

<?php elseif (is_page('contact-us')) : ?>
    <script>
        jQuery(document).ready(function($) {
            $('.map img').click(function() {
                $(this).replaceWith(`<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2979.81454097319!2d-86.12738829999999!3d41.6813486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8816cfced1933acd%3A0xdf1e5c9119ca9b1e!2s13421%20McKinley%20Hwy%2C%20Mishawaka%2C%20IN%2046545%2C%20USA!5e0!3m2!1sen!2sph!4v1713774385763!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`);
            });
        });
    </script>

<?php elseif (is_page('shipping-info')) : ?>
    <script>
        jQuery(document).ready(function($) {
            $('section.video img').click(function() {
                $(this).replaceWith(`<iframe width="960" height="315" src="https://www.youtube.com/embed/8Ziw73eZBl4" title="OCF SHIPPING VIDEO" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`);
            });
        });
    </script>

<?php elseif (is_single()) : ?>
    <script>
        jQuery(document).ready(function($) {
            const comments = $('ol.commentlist li');
            const maxVisibleComments = 3;
            comments.each(function(index) {
                if (index >= maxVisibleComments) {
                    $(this).hide();
                }
            });
            if (comments.length == 0) {
                $('.load_more').hide();
            }
            $('.load_more').click(function() {
                var hiddenComments = $('ol.commentlist li[style*="display: none;"]');
                if (hiddenComments.length > 0) {
                    $(hiddenComments[0]).slideDown().removeAttr('style');
                }
                if (hiddenComments.length <= 1) {
                    $('.load_more').hide();
                }
            });

            $('section.product_reviews .iframe img.play_button').click(function() {
                $(this).hide();
                $('section.product_reviews .iframe img.video_thumbnail').hide();
                $('section.product_reviews .iframe iframe').removeClass('d-none');
            });
        });
    </script>

<?php elseif (is_page('4th-of-july-fireworks-for-sale') || is_page(257)) : ?>
    <script>
        jQuery(document).ready(function($) {
            setEqualHeightForSection('section.best_fire_word', 'h3');
            setEqualHeightForSection('section.how_to_plan_you_4th_of_july', 'h3');
            setEqualHeightForSection('section.how_to_use_4th_of_july', 'h3');
        });
    </script>

<?php elseif (is_page('After you order') || is_page(239)) : ?>
    <script>
        jQuery(document).ready(function($) {
            $('section.banner .video img,section.banner .content img').click(function() {
                $(this).replaceWith(`<iframe width="560" height="315" src="https://www.youtube.com/embed/8Ziw73eZBl4?si=LrYGT--kw-wd7UQH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`);
            });
        });
    </script>

<?php elseif (is_page('Product Demos')) : ?>
    <script>
        jQuery(document).ready(function($) {
            $('section.product_demos .content2020 img').click(function() {
                $(this).replaceWith(`<iframe width="560" height="315" src="https://www.youtube.com/embed/U63bT6HuvKk?si=yD0XMxXNLCyLlHlh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`);
            });
            $('section.product_demos .content2019 img').click(function() {
                $(this).replaceWith(`<iframe width="560" height="315" src="https://www.youtube.com/embed/i0px8Or4d_M?si=WK6QdbgHQv8BYca2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`);
            });
        });
    </script>
<?php endif; ?>

<script>
    function setEqualHeightForSection(sectionSelector, secondSelector) {
        var elementsToResize = jQuery(sectionSelector).find(secondSelector);
        var tallestHeight = 0;
        elementsToResize.each(function() {
            var height = jQuery(this).height();
            if (height > tallestHeight) {
                tallestHeight = height;
            }
        });
        elementsToResize.css('height', tallestHeight);
    }
</script>