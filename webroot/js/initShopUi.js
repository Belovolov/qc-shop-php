$(document).ready( function(){
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
    $("#slider-range").slider({
        range: true,
        min: window.MinScalePrice,
        max: window.MaxScalePrice,
        values: [window.MinPrice, window.MaxPrice],
        //values: [0,100],
        slide: function (event, ui) {
            $("#value-lower").text(ui.values[0]);
            $("#value-upper").text(ui.values[1]);
        }
    });
    $("#value-lower").text($("#slider-range").slider("values", 0));
    $("#value-upper").text($("#slider-range").slider("values", 1));


    $('button.item-pagination').click(function(e) {
        e.preventDefault();
        $('#filtering > input[name=page]').val($(this).attr("data-page"))
        $('#filtering').trigger('submit');
    })
    $("#page-size-selection").on('change', function () {
        $('#filtering > input[name=itemsPerPage]').val($(this).val())
        $('#filtering').trigger('submit');
    })
    $("#filter-price").on('click', function () {
        $('#filtering > input[name=minPrice]').val($("#slider-range").slider("values", 0))
        $('#filtering > input[name=maxPrice]').val($("#slider-range").slider("values", 1))
        $('#filtering').trigger('submit');
    })
    $('#sort-selection').on('change', function () {
        $('#filtering > input[name=sortOrder]').val($(this).val())
        $('#filtering').trigger('submit');
    })

    $("#search-submit").click(function () {
        search($("#search-query").val())

    })
    $("#search-query").keyup(function (e) {
        if (e.key == 'Enter') {
            search($(this).val())
        }
    })
    function search(query) {
        $('#filtering > input[name=searchQuery]').val(query)
        $('#filtering').trigger('submit');
    }
    $("#search-clear").click(function () {
        $("#search-query").val('')
        $("#search-query").focus()
    })
})