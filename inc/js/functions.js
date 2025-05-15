function setEqualHeightForSection(sectionSelector, secondSelector, groupSizeBreakpoints) {
    var elementsToResize = $(sectionSelector).find(secondSelector);
    elementsToResize.css('height', 'auto'); // Reset height to auto first

    var windowWidth = $(window).width();
    var groupSize = 1; // default

    // Use provided breakpoints or fallback to defaults
    var breakpoints = groupSizeBreakpoints || [
        { min: 1200, size: 5 },
        { min: 992, size: 4 },
        { min: 768, size: 3 },
        { min: 480, size: 2 },
        { min: 0, size: 1 }
    ];

    for (var b = 0; b < breakpoints.length; b++) {
        if (windowWidth >= breakpoints[b].min) {
            groupSize = breakpoints[b].size;
            break;
        }
    }

    for (var i = 0; i < elementsToResize.length; i += groupSize) {
        var tallestHeight = 0;
        var group = elementsToResize.slice(i, i + groupSize);

        group.each(function () {
            var height = $(this).outerHeight();
            if (height > tallestHeight) {
                tallestHeight = height;
            }
        });

        group.height(tallestHeight);
    }
}

$(document).ready(function () {
    $(window).on('load', function () {

    });

    $('img[loading="lazy"]').each(function () {
        var $img = $(this);
        var originalSrc = $img.attr('data-src') || $img.attr('src');
        if (originalSrc) {
            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            var img = entry.target;
                            img.src = img.getAttribute('data-src');
                            observer.unobserve(img);
                        }
                    });
                });
                observer.observe(this);
            } else {
                $img.attr('src', originalSrc);
            }
            $img.on('load', function () {
                var width = $img.width();
                var height = $img.height();
                $img.attr({
                    'width': width,
                    'height': height
                });
            }).attr({
                'data-src': originalSrc,
                'decoding': 'async'
            }).one('error', function () {
                $(this).attr('src', originalSrc);
            });
        }
    });

    setEqualHeightForSection('section.blogs', 'h3', [
        { min: 1200, size: 4 },
        { min: 992, size: 3 },
        { min: 768, size: 2 },
        { min: 0, size: 1 }
    ]);

    // Alert if page has missing H1
    if ($('h1').length === 0) {
        alert('Warning: This page is missing an <h1> tag.');
    }

    // Alert if page has duplicated H1
    if ($('h1').length > 1) {
        alert('Warning: This page has duplicated <h1> tags.');
    }

    // Alert if page has duplicated H2
    if ($('h2').length > 1) {
        alert('Warning: This page has duplicated <h2> tags.');
    }

    // Alert if there are broken images
    $('img').each(function () {
        var img = this;
        // Only check if not already errored
        $(img).one('error', function () {
            alert('Warning: Broken image detected: ' + $(img).attr('src'));
        });
        // For cached images, trigger error if already broken
        if (img.complete && typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0) {
            $(img).trigger('error');
        }
    });
});