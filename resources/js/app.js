require('./bootstrap');

//Настройка валидации плагина
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
        }
        })
    }
})
