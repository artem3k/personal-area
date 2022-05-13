$(function (){
    let loginForm = $('#login-form')
    loginForm.validate({
        after: function (){
            window.location.href = '/home'
        }
    })
})
