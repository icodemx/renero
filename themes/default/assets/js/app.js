$(document).ready(function(){

    $('.sliderbooks').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('#vmenu').click(function(e){
        e.preventDefault();
        var menu = $(this).closest('.navleft');
        if (menu.hasClass('active')){
            menu.removeClass('active');
        } else {
            menu.addClass('active');
        }
    });

    $('.project_prev_pic').click(function(e){
        e.preventDefault();
        var ruta = $(this).find('img').attr('data-path');
        $('#img_toshow').attr('src',ruta);
        $('#modal_prevpic').modal('show');


        setTimeout(function(){
            if ($('#img_toshow').height() > $('#img_toshow').width()){
                $('.modal-dialog').width('50%');
            } else {
                $('.modal-dialog').width('90%');
            }
        }, 300);
    });

    $('.formulario').ajaxForm({
        dataType: 'json',
        beforeSubmit: function(){
            $('#sbmt_msg').attr('disabled','disabled');
        },
        success: function(response){
            if (response.success){
                $('.formulario')[0].reset();
                alert('Tu mensaje ha sido enviado correctamente.');
                location.reload();
            } else {
                alert('Ha ocurrido un error, por favor revisa tu informaciÃ³n para continuar.');
                $('#sbmt_msg').removeAttr('disabled');
            }
        },
        /*
        error: function(response){
            alert('Ha ocurrido un error, por favor intÃ©ntalo de nuevo mÃ¡s tarde.');
            $('#sbmt_msg').removeAttr('disabled');
        }
        */
        error: function(response){
            $('.formulario')[0].reset();
            alert('Tu mensaje ha sido enviado correctamente.');
            location.reload();
        }
    });

});