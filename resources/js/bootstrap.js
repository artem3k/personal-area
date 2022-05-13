window._ = require('lodash');
window.$ = window.jQuery = require( "jquery" );
require('jquery-validation')
require('jquery-validation/dist/localization/messages_ru')
require('cleave.js')
require('@popperjs/core')
window.Swal = require('sweetalert2')
window.bootstrap = require('bootstrap')

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json'
    }
})


