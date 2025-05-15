<div class="blog_content" onclick="window.location.href='<?= $link ?>'">
    <div class="image">
        <img src="<?= $img ?>" alt="<?= $title ?>" loading="lazy">
    </div>
    <div class="main_content">
        <h3><?= $title ?></h3>
        <?= $excerpt ?>
        <a href="<?= $link ?>" target="_blank" rel="noopener noreferrer" class="read_more">Read More</a>
    </div>
</div>