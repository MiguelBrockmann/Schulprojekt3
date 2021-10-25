$(document).ready(function(){
    $('#save-recipe').click(function(){
        f1 = $('#save-recipe').attr('u-target');
        f2 = $('#save-recipe').attr('r-target');
        img1 = '<img class="me-1" src="http://localhost:8080/assets/image/icon/ui/unsave.svg"> Gespeichert';
        img2 = '<img class="me-1" src="http://localhost:8080/assets/image/icon/ui/save.svg"> Rezept speichern'
        $.ajax({
            type: "POST",
            url: "../src/ajax/saverecipe.ajax.php",
            data: {
                user: f1,
                recipe: f2
            },
            success: function (html) {
                if($('#save-recipe').hasClass('btn-black')){
                    $('#save-recipe').addClass('btn-secondary');
                    $('#save-recipe').removeClass('btn-black');
                    $('#save-recipe').html(img1);
                }
                else{
                    $('#save-recipe').addClass('btn-black');
                    $('#save-recipe').removeClass('btn-secondary');
                    $('#save-recipe').html(img2);
                }
            }
        });
    });
});