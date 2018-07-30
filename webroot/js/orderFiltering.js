$(document).ready(function () {
    var baseUrl = $('base').attr('href');
    $("#status").selectmenu({
        change: function (event, data) {
            var val = $(this).val()
            if (val == 3) {
                location.href = baseUrl + "orders/index"
            }
            else {
                location.href = baseUrl + "orders/index?status=" + val
            }
        }
    })            
});