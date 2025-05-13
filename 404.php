<?php get_header(); ?>
<div class="container text-center" style="padding: 60px 0;">
    <h1 class="display-1" style="font-size: 6rem; font-weight: bold;">404</h1>
    <h2 class="mb-4">Page Not Found</h2>
    <p class="mb-4">Sorry, the page you are looking for does not exist or has been moved.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
</div>
<?php get_footer(); ?>