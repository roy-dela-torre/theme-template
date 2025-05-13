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
        $('img').each(function () {
            if (!$(this).attr('src')) {
                $(this).attr('src', 'http://i.giphy.com/9J7tdYltWyXIY.gif'); // fallback if no src
            }
        });
        $('img').on('error', function () {
            $(this).attr('src', 'http://i.giphy.com/9J7tdYltWyXIY.gif'); // fallback if error
        });
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
});