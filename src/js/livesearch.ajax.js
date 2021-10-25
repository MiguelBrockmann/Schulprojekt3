function fill(val){
    $('#navbar-search-input').val(val);
    $('#search-results').hide();
}

$(document).ready(function(){
    $('#navbar-search-input').keyup(function(){
        var input = $('#navbar-search-input').val();

        if(input == ""){
            $('#search-results').html("");
            $('#search-results').css("display", "none");
        }
        else{
            if(input.length >= 2){
                $.ajax({
                    type: "POST",
                    url: "../src/ajax/livesearch.ajax.php",
                    data: {
                        search: input
                    },
                    success: function (html) {
                        $('#search-results').html(html).show();
                    }
                });
            }
        }
    });
});