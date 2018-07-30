$(document).ready(function () {
    var baseUrl = $('base').attr('href');
    $(".btn-num-product-down").click(function () {
        var curr = +$(".num-product").val()
        if (curr > 1) {
            $(".num-product").val(--curr)
        }
    })
    $(".btn-num-product-up").click(function () {
        var curr = +$(".num-product").val()            
        $(".num-product").val(++curr)
    })
    $('#add-to-cart').click(function () {
        var amount = +$(".num-product").val() 
        var itemId = $(this).attr('data-id');
        location.href = `${baseUrl}shoppingcart/addtoshoppingcart?itemId=${itemId}&amount=${amount}`;
    })
})