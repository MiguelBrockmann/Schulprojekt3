$(document).ready(function(){
    $('.filter-option, #filter-select-allergen').change(function(){
        var vals = $("input:checkbox[name='filter-option']").map(function(){
            return $(this).is(':checked');
        }).get();
        var filter_select = $("#filter-select-allergen").val();

        console.log(filter_select);

        $.ajax({
            type: "POST",
            url: "../src/ajax/get_filter.ajax.php",
            data: {
                select: filter_select,
                filter: vals
            },
            success: function (html) {
                $('#filter-recipes').html(html);
            }
        });
    });
});