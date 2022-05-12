window._ = require('lodash');
window.$ = window.jQuery = require( "jquery" );
require('jquery-validation')
require('jquery-validation/dist/localization/messages_ru')

try {
    require('bootstrap');
} catch (e) {}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json'
    }
})


