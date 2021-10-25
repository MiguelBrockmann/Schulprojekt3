$(document).ready(function(){
    $('#following').click(function(){
        f1 = $('#following').attr('fllwid');
        f2 = $('#following').attr('fllwrid');
        $.ajax({
            type: "POST",
            url: "../src/ajax/follow.ajax.php",
            data: {
                followed: f1,
                follower: f2
            },
            success: function () {
                if($('#following').hasClass('btn-green')){
                    $('#following').addClass('btn-secondary');
                    $('#following').removeClass('btn-green');
                    $('#following').html('Entfolgen');
                }
                else{
                    $('#following').addClass('btn-green');
                    $('#following').removeClass('btn-secondary');
                    $('#following').html('Folgen');
                    // SET FOLLOW COUNT + 1
                }
            }
        });
    });
});