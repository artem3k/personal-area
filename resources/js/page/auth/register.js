$(function (){
    let registerForm = $('#register-form')
    registerForm.validate({
        rules:{
            'series': {
                series: true
            },
            'number':{
                minlength: 6
            }
        }
    })
    new Cleave('#seriesInput', {
        delimiter: ' ',
        blocks: [2,2],
    });
})
