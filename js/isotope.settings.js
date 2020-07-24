jQuery(document).ready(function ($) {

    // Grab the .items container
    var $container = $('.grid');

    var $courses = $($container).isotope({
        // options
        itemSelector: '.post',
        layoutMode: 'masonry',
        percentPosition: true,
        columnWidth: '.grid-sizer',
        transitionDuration: '0.2s',
        getSortData: {
            name: "h2"
        }
    });

    // layout Isotope again after all images have loaded
    $courses.imagesLoaded(function () {
        $courses.isotope('layout');
    });

    // Sort based on various factors
    $('.sort-clear .sort').on('click', function () {
        if ($(this).hasClass('checked')) {
            $(this).removeClass('checked');
            $container.isotope({ sortBy: 'original-order' });
        } else {
            var sortValue = $(this).attr('data-sort-value');
            $container.isotope({ sortBy: sortValue });
            $(this).addClass('checked');
        }
    });

    var $checkboxes = $('.filter-list input');
    $checkboxes.change(function () {
        var filters = [];
        // Get the values of the checked checkboxes.
        // Place the values in the filters array.
        $checkboxes.filter(':checked').each(function () {
            filters.push(this.value);
        });
        // Concatenate the values from the filters array into a single string.
        var filterValue = filters.join('');
        $container.isotope({ filter: filterValue });
        console.log(filterValue);
    });

    // Add the .checked class to list items holding a checked checkbox.
    $('.filter-list input:checkbox').click(function () {
        $('.filter-list li:has(input:checkbox:checked)').addClass('checked');
        $('.filter-list li:has(input:checkbox:not(:checked))').removeClass('checked');
    });

    // Clear all checkboxes, remove .checked class from containing list items.
    $('.sort-clear .clear-all').on('click', function () {
        $('.filter-list input:checkbox:checked').removeAttr('checked');
        $container.isotope({ filter: '*' });
        $('.filter-list li:has(input:checkbox:not(:checked))').removeClass('checked');
    });

});
