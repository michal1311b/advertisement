/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./tagsinput');
require('./typeahead.bundle.min');
require('./bloodhound.min');
require('./bootstrap-tagsinput.min');
require('select2');
require('../../node_modules/bootstrap-select/dist/js/bootstrap-select.min');
require('../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker');
require('../../node_modules/bootstrap-slider/dist/bootstrap-slider.min');
require('slick-carousel');

var notifications = [];

const NOTIFICATION_TYPES = {
    follow: 'App\\Notifications\\UserFollowed',
    newPost: 'App\\Notifications\\NewPost',
    newMessage: 'App\\Notifications\\NewMessage'
};

$(document).ready(function() {
    var mySlider = $("#range").bootstrapSlider({
        min: 0,
        max: 1000,
        step: 20,
        value: [0, 800],
        tooltip: 'always',
        range: true,
        ticks_tooltip: true,
        labelledby: ['ex18-label-2a', 'ex18-label-2b']
    });
    // check if there's a logged in user
    if(Laravel.userId) {
        $.get('/offer/notifications', function (data) {
            addNotifications(data, "#notifications");
        });
    }

    var Inputmask = require('inputmask');

    Inputmask("99-99-9999", {
        "clearIncomplete": true
    }).mask($('#birthday'));

    Inputmask("99-999", {
        "clearIncomplete": true
    }).mask($('#post_code'));

    $('.start_date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.end_date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#start_date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end_date').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#start_course').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end_course').datepicker({
        format: 'yyyy-mm-dd'
    });
    
    $('#specializations').select2({
        width: '100%'
    });

    $('#work_id').selectpicker();
    $('#state_id').selectpicker();
    $('#category_id').selectpicker();
    $('#location_id').selectpicker({
        width: '100%'
    });
    $('#user_location_id').selectpicker({
        width: '100%'
    });
    $('#specialization_id').selectpicker({
        width: '100%'
    });
    $('#location_ids').selectpicker({
        width: 'fit'
    });
    $('#specialization_ids').selectpicker({
        width: 'fit'
    });

    (function () {
        var session_key = window.localStorage.getItem('session_key')
        if (!session_key) {
          session_key = Math.floor(Date.now() / 1000)
          window.localStorage.setItem('session_key', session_key)
        }
      
        var payload = {
          url: window.location.href,
          host: window.location.hostname,
          action: 'visit',
          title: document.title,
          email: LoggedUser ? LoggedUser.email : null,
          session_key: session_key
        }
      
        $.post(window.location.protocol + '//' + window.location.host + "/api/stats", payload);
    })()

    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });

    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
            pauseOnHover: false,
            responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });

    $(".go-step2").click(function(){
        $('#myTab li:eq(1) a').tab('show');
        window.scrollTo(0, 0);
    });
    $(".go-step3").click(function(){
        $('#myTab li:eq(2) a').tab('show');
        window.scrollTo(0, 0);
    });

    window.Dropzone = require('dropzone');
    Dropzone.autoDiscover = false;

    Dropzone.options.dropzone =
        {
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        thumbnailHeight: 120,
        thumbnailWidth: 120,
        thumbnail: function(file, dataUrl) {
            if (file.previewElement) {
              file.previewElement.classList.remove("dz-file-preview");
              var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
              for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
              }
              setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
            }
        },
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
    
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
            return false;
        }
    };

    var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;

    dropzone.uploadFiles = function(files) {
    var self = this;

    for (var i = 0; i < files.length; i++) {

        var file = files[i];
        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

        for (var step = 0; step < totalSteps; step++) {
        var duration = timeBetweenSteps * (step + 1);
        setTimeout(function(file, totalSteps, step) {
            return function() {
            file.upload = {
                progress: 100 * (step + 1) / totalSteps,
                total: file.size,
                bytesSent: (step + 1) * file.size / totalSteps
            };

            self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
            if (file.upload.progress == 100) {
                file.status = Dropzone.SUCCESS;
                self.emit("success", file, 'success', null);
                self.emit("complete", file);
                self.processQueue();
                //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
            }
            };
        }(file, totalSteps, step), duration);
        }
    }
    }
});

function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    // show only last 5 notifications
    notifications.slice(0, 5);
    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if(notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications');
        $('#badge-notify').text(notifications.length);
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
        $('#badge-notify').text(0);
    }
}

// Make a single notification string
function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    return '<li class="dropdown-header"><a href="' + to + '">' + notificationText + '</a></li>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var read = `?read=${notification.id}`;
    if(notification.type === NOTIFICATION_TYPES.follow) {
        to = 'offer/users' + read;
    } else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const postSlug = notification.data.slug;
        to = `offer/show/${postSlug}` + read;
    } else if(notification.type === NOTIFICATION_TYPES.newMessage) {
        const contactId = notification.data.contact_id;
        to = `user/contacts/${contactId}/reply` + read;
    }

    return '/' + to;
}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.follow) {
        const name = notification.data.follower_name;
        text += `<li class="dropdown-header"><strong>${name}</strong> followed you</li>`;
    } else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const name = notification.data.following_name;
        text += `<li class="dropdown-header"><strong>${name}</strong> published a post</li>`;
    } else if(notification.type === NOTIFICATION_TYPES.newMessage) {
        const email = notification.data.email;
        text += `<li class="dropdown-header"><strong>${email}</strong> send You a message</li>`;
    }
    return text;
}

require('./questionnaire');


// window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
