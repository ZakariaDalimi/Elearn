$(document).ready(function () {
    var saved = 'no';
    var user = $('#user').val();
    var lesson = $('#lesson').val();
    
    $('.ss').click(function() {

        if ($(this).hasClass('saved')) {
            saved = 'yes';
        }
        $.ajax({
            url: 'save.php',
            method: 'POST',
            data:{saved:saved,user:user,lesson:lesson},
            success:function(result){
                $('#res').html(result);
            }
        })
    })
});