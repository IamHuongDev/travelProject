window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'f8c42e70a3fba0bbb88c',
    cluster: 'ap1',
    forceTLS: true
});

window.getFormData = function($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    $.map(unindexed_array, function(n,i){
        indexed_array[n["name"]] = n["value"];
    });
    return indexed_array;
};

window.displayErorr = function(res){
    var errors = res.response.data.errors;
    $.each(errors, function(key, value) {
        toastr.error(value);
    });
};
