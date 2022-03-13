window._ = require("lodash");
window.toastr = require("toastr");
window.Swal = require("sweetalert2");
window.FileUploadWithPreview = require("file-upload-with-preview");
window.lightbox = require("lightbox2");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

try {
    // window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
    require("select2");
    $(".select2_basic").select2({
        tags: true,
        dropdownParent: $(".tampilModal"),
    });
    // require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
