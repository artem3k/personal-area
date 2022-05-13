$(function (){
    let form = $('#emailForm')
    form.validate({
        after: function (){
            Swal.fire(
                'Письмо отправлено!',
                'Если письма нет, проверти спам.',
                'success'
            )
        }
    })
})
