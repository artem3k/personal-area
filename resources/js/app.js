require('./bootstrap');

//Настройка валидации плагина
$.validator.addMethod('series', function (value) {
    return /^[0-9][0-9] [0-9][0-9]$/.test(value);
}, 'Не верный формат серии паспорта');
jQuery.validator.setDefaults({
    errorElement: 'div',
    errorPlacement: function (error, element){
        error.insertAfter(element)
        $(error).addClass('invalid-feedback')
    },
    highlight: function (element, errorClass, validClass){
        $(element).addClass('is-invalid')
    },
    unhighlight: function (element, errorClass, validClass){
        $(element).removeClass('is-invalid')
    },
    submitHandler: function (form){
        $(form).find('button[type="submit"]').addClass('disabled').attr({'disabled': true})
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            error: function (jqXHR, exception){
                let errors = jqXHR.responseJSON.errors;
                let errorsFormat = {}
                for (let key in errors) {
                    errorsFormat[key] = errors[key][0]
                    console.log(errorsFormat)
                }
                let validator = $.data( form, "validator")
                validator.showErrors(errorsFormat)
                $(form).find('button[type="submit"]').removeClass('disabled').attr({'disabled': false})
            },
            success: function (response){
                if(response.redirect !== undefined){
                    window.location = response.redirect
                }
                $(form).find('button[type="submit"]').removeClass('disabled').attr({'disabled': false})
            }
        })
    }
})

