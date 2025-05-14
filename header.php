<?php $css_path = get_stylesheet_directory_uri() . '/inc/css'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title() ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= $css_path ?>/normalize.css">
</head>

<body <?php echo body_class(); ?>>
    <nav class="navbar navbar-expand-xxl py-0">
        <div class="container-fluid">
            <a href="<?php echo get_home_url(); ?>">
                <!-- <img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/global/logo.png" alt="" class="img-fluid w-100"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" data-bs-theme-value="light">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'navMenu navbar-nav',
                    'container' => false,
                ));
                ?>
                <div class="group_btn">
                    <a href="http://" target="_blank" rel="noopener noreferrer" class="transparent_btn">Login</a>
                    <a href="<?= get_home_url() ?>/signup/" target="_blank" rel="noopener noreferrer" class="green_btn">Get started - <span>It’s free</span></a>
                </div>
            </div>
        </div>
    </nav>