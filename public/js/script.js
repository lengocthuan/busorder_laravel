$('.form-control').each(function() {
    floatedLabel($(this));
});

$('.form-control').on('input', function() {
    floatedLabel($(this));
});

function floatedLabel(input) {
    var $field = input.closest('.form-group');
    if (input.val()) {
        $field.addClass('input-not-empty');
    } else {
        $field.removeClass('input-not-empty');
    }
}

$(document).ready(function() {

    // For the Second level Dropdown menu, highlight the parent	
    $(".dropdown-menu")
        .mouseenter(function() {
            $(this).parent('li').addClass('active');
        })
        .mouseleave(function() {
            $(this).parent('li').removeClass('active');
        });

});
