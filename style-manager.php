<?php

/**
 * Style Manager Template
 * Loads stylesheets conditionally based on page context.
 */

$theme_uri = get_stylesheet_directory_uri();
$css_path = $theme_uri . '/inc/css/';

// Preload and fallback for global styles
?>
<link rel="preload" href="<?php echo $theme_uri; ?>/assets/bootstrap/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="<?php echo $theme_uri; ?>/assets/bootstrap/bootstrap.min.css">
</noscript>
<link rel="preload" href="<?php echo $css_path; ?>global_desktop.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="<?php echo $css_path; ?>global_desktop.css">
</noscript>
<link rel="preload" media="screen and (max-width: 991px)" href="<?php echo $css_path; ?>global_mobile.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" media="screen and (max-width: 991px)" href="<?php echo $css_path; ?>global_mobile.css">
</noscript>
<link rel="preload" href="<?php echo $css_path; ?>product_template.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="<?php echo $css_path; ?>product_template.css">
</noscript>
<?php

// Map page slugs/IDs to CSS files
$page_css = [
    'thank-you' => 'thank-you.css',
    'blogs' => 'blogs.css',
    'terms-conditions' => 'term_and_condition.css',
    'Privacy Policy' => 'privacy_policy.css',
    3 => 'privacy_policy.css',
    // 'cart' => 'cart.css', // WooCommerce related, removed
    'contact-us' => 'contact-us.css',
    'show-builder' => 'show_builder.css',
    'login' => 'login.css',
    103 => 'login.css',
    'forgot-password' => 'forgot_password.css',
    216 => 'forgot_password.css',
    'register' => 'register.css',
    105 => 'register.css',
    'register-discount' => 'register.css',
    'events' => 'events.css',
    62 => 'events.css',
    'about-us' => 'about_us.css',
    'shipping-info' => 'shipping_info.css',
    'after-you-place-an-order' => 'after_you_order.css',
    239 => 'after_you_order.css',
    'curbside-pickup' => 'curbsided_pickup.css',
    'brands' => 'brands.css',
    'product-demos' => 'product_demos.css',
    'sign-up-to-save' => 'sign-up-to-save.css',
    250 => 'sign-up-to-save.css',
    'professional-fireworks' => 'professional-fireworks.css',
    254 => 'professional-fireworks.css',
    'Fireworks Supply Store' => 'supply.css',
    72 => 'supply.css',
    'Special Deals & Prices for Firework' => 'special_deals.css',
    'Novelty Fireworks for Sale' => 'novelty.css',
    306 => 'novelty.css',
    'Fireworks Supply Store' => 'firewors-supply-status.css',
    'Sky Show' => 'sky-show.css',
    'Ground Effects' => 'ground_effect.css',
    'Store Hours' => 'store-hours.css',
    806 => 'store-hours.css',
    'State Firework Laws' => 'state-fireworks-law.css',
    818 => 'state-fireworks-law.css',
    'Fireworks Club' => 'fireworks-club.css',
    916 => 'fireworks-club.css',
    'Why Buy From Us' => 'why-buy-from-us.css',
    952 => 'why-buy-from-us.css',
];

// Special cases
if (is_front_page()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'index.css">';
    echo '<link rel="stylesheet" href="' . $css_path . 'owl.carousel.min.css">';
    echo '<link rel="stylesheet" href="' . $css_path . 'owl.theme.default.min.css">';
} elseif (is_404()) {
    echo '<link rel="stylesheet" href="' . $css_path . '404.css">';
}
// Removed WooCommerce related conditions
/*
elseif (is_cart()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'cart.css">';
} elseif (is_checkout()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'checkout.css">';
} elseif (function_exists('is_order_received_page') && is_order_received_page()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'is_order_received_page.css">';
}
*/
elseif (is_category()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'category.css">';
}

// Loop through mapping for page-specific CSS
foreach ($page_css as $key => $css_file) {
    if ((is_string($key) && is_page($key)) || (is_int($key) && is_page($key))) {
        echo '<link rel="stylesheet" href="' . $css_path . $css_file . '">';
    }
}

// Extra styles for about-us and events pages
if (is_page('about-us')) {
    echo '<link rel="stylesheet" href="' . $css_path . 'owl.carousel.min.css">';
    echo '<link rel="stylesheet" href="' . $css_path . 'owl.theme.default.min.css">';
}
if (is_page('events') || is_page(62) || is_category()) {
    echo '<link rel="stylesheet" href="' . $css_path . 'events.css">';
    echo '<link rel="stylesheet" href="' . $css_path . 'category.css">';
}
?>