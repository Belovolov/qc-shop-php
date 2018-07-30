$(document).ready(function () {
    window.cartSubmitTimer = null
    window.baseUrl = $('base').attr('href')
    $(".btn-num-product-down").click(function () {
        clearTimeout(window.cartSubmitTimer)
        var id = $(this).attr('data-itemId')
        var curr = +$("input[data-itemId=" + id + "]").val()
        if (curr > 1) {
            $("input[data-itemId=" + id + "]").val(--curr)
            window.cartSubmitTimer = setTimeout(function () {
                location.href = window.baseUrl + "ShoppingCart/SetAmountInCart?itemId=" + id + "&amount=" + curr;
            }, 1000)
        }
        
    })
    $(".btn-num-product-up").click(function () {
        clearTimeout(window.cartSubmitTimer)
        var id = $(this).attr('data-itemId')
        var curr = +$("input[data-itemId=" + id + "]").val()
        $("input[data-itemId=" + id + "]").val(++curr)
        window.cartSubmitTimer = setTimeout(function () {
            location.href = window.baseUrl + "ShoppingCart/SetAmountInCart?itemId=" + id + "&amount=" + curr;
        }, 1000)
    })
    $('#add-to-cart').click(function () {
        var id = $(this).attr('data-itemId')
        var amount = +$("input[data-itemId=" + id + "]").val()
        location.href = window.baseUrl + "shoppingcart/SetAmountInCart?itemId=" + id + "&amount=" + amount;
    })
})