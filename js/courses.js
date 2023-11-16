$(document).ready(function () {
    
    $('.categories').click(function() {
        $('.categories').removeClass('active');
        $(this).addClass('active');
    })
    $('.language').click(function() {
        $(this).toggleClass('langPicked');
        $(this).find('.x').toggleClass('showed');
    })

    function filter() { 
        var action = 'data';
        var categorie = get_filter('categorie');
        var language = get_filter('language');
        var search = get_filter('search');

        $.ajax({
            url: 'filter.php',
            method: 'POST',
            data:{action:action,categorie:categorie,language:language,search:search},
            success:function(result){
                $('#result').html(result);
            }
        })
     }
    // FILTERING CARS 
    $('.item').click(function() {
        filter();
    })
    $('#search').keyup(function () { 
        filter();
    });
    $('#clear').click(function () { 
        $('.language').removeClass('langPicked');
        $('.language').find('.x').removeClass('showed');
        filter();
    });
    $('#all').click(function() {
        All_langs();
        filter();
    })
    $('#1').click(function() {
        All_langs();
        $('#HTML').css('display', 'none');
        $('#CSS').css('display', 'none');
        $('#JavaScript').css('display', 'none');
    })
    $('#2').click(function() {
        All_langs();
        $('#PHP').css('display', 'none');
        $('#SQL').css('display', 'none');
    })

    function get_filter(filter_class) {
        var checked_values = [];
        if (filter_class == 'categorie') {
            $('.categorie.active').each(function() {
                checked_values.push($(this).attr('id'));
            })
        } else if (filter_class == 'search') {
            checked_values.push($('#search').val());
        } 
        else if (filter_class == 'language') {
            $('.language.langPicked').each(function() {
                checked_values.push($(this).attr('id'));
            })
        }
        return checked_values;
    }

    function All_langs() {
        $('#HTML').css('display', 'block');
        $('#CSS').css('display', 'block');
        $('#JavaScript').css('display', 'block');
        $('#PHP').css('display', 'block');
        $('#SQL').css('display', 'block');
    }
});