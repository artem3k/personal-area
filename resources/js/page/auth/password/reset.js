$(function (){
    let form = $('#resetForm')
    form.validate({
        after: function (){
            Swal.fire({
                title: 'Пароль сброшен!',
                icon: 'success'
            }).then(() => {
                window.location.href = '/home'
            })
        }
    })
})
