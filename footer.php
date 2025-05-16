</body>
<?php wp_footer(); ?>
<script src="<?= get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/inc/js/functions.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let images = document.querySelectorAll('img');
        let largeImages = 0;
        let checked = 0;

        if (images.length === 0) return;

        images.forEach(function(img) {
            // If image is already loaded
            if (img.complete && img.naturalWidth) {
                checkImage(img);
            } else {
                img.addEventListener('load', function() {
                    checkImage(img);
                });
                img.addEventListener('error', function() {
                    checked++;
                    if (checked === images.length && largeImages > 0) {
                        showOptimizerForm();
                    }
                });
            }
        });

        function checkImage(img) {
            // 1MB = 1048576 bytes
            fetch(img.src, {
                    method: 'HEAD'
                })
                .then(response => {
                    let size = response.headers.get('content-length');
                    checked++;
                    if (size && parseInt(size) > 1048576) {
                        largeImages++;
                    }
                    if (checked === images.length && largeImages > 0) {
                        showOptimizerForm();
                    }
                })
                .catch(() => {
                    checked++;
                    if (checked === images.length && largeImages > 0) {
                        showOptimizerForm();
                    }
                });
        }

        function showOptimizerForm() {
            let div = document.createElement('div');
            div.innerHTML = `<?= do_shortcode('[image_optimizer_form]'); ?>`;
            document.body.appendChild(div);
        }
    });
</script>

</html>