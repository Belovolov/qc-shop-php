$(document).ready(function () {
    var baseUrl = $('base').attr('href');
    $("#status").selectmenu({
        change: function (event, data) {
            var val = $(this).val()
            if (val == 3) {
                location.href = baseUrl + "users/index"
            }
            else {
                location.href = baseUrl + "users/index?status=" + val
            }
        }

    })
});