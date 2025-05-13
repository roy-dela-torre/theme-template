<?php $css_path = get_stylesheet_directory_uri() . '/inc/css'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_header(); ?>
    <link rel="stylesheet" href="<?= $css_path ?>/normalize.css">
</head>

<body <?php echo body_class(); ?>>