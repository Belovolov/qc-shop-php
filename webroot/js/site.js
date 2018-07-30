// Write your JavaScript code.
$(document).ready(function() {
    $('#confirmation-message').modal()

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    if ($(window).height() == $(document).height()) {
        $('footer').css('position','fixed');
        $('footer').css('bottom','0');
        $('footer').css('width','100vw');
    }    
})


