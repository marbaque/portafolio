jQuery(function ($) {
    // init Masonry
    var $grid = $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        // use element for option
        columnWidth: '.grid-sizer',
        percentPosition: true,
        horizontalOrder: true,
        transitionDuration: '0.5s',
        stagger: 30
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
    });

    // get Masonry instance
    var msnry = $grid.data('masonry');

    // init Infinite Scroll
    $grid.infiniteScroll({
        // Infinite Scroll options...
        append: '.grid__item',
        outlayer: msnry,
    });
});