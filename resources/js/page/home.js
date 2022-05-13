$(function (){
    let $menuItems = $('.menu-item')

    $menuItems.click(function (){
        document.location.hash = $(this).attr('href')
    })
    if(document.location.hash) {
        $('a[href="' + document.location.hash + '"]').tab('show');
    }

    $('#password-change-form').validate({
        after: function (){
            Swal.fire({
                    'title': 'Пароль изменен!',
                    'icon': 'success'
            })
        }
    })

    $('#change-data-form').validate({
        resetForm: false,
        rules:{
            'series': {
                series: true
            },
            'number':{
                minlength: 6
            }
        },
        after: function (){
            Swal.fire({
                'title': 'Данные изменены!',
                'icon': 'success'
            })
        }
    })
    new Cleave('#seriesInput', {
        delimiter: ' ',
        blocks: [2,2],
    });

    $('#questionnaire-form').validate({
        after: function (){
            $('#thank-you-questionnaire').removeClass('d-none')
            $('#questionnaire-form').remove()
            Swal.fire({
                'title': 'Анкета отправлена!',
                'icon': 'success'
            })
        }
    })
})
