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
require('./addtohomescreen');

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
});

var deferredPrompt;
window.addEventListener('beforeinstallprompt', function(event) {
  event.preventDefault();
  deferredPrompt = event;
  addToHomeScreen();
  return false;
});

window.addToHomeScreen = function() {
    console.log(5);
  if (deferredPrompt) {
    deferredPrompt.prompt();
    deferredPrompt.userChoice.then(function (choiceResult) {
      console.log(choiceResult.outcome);
      if (choiceResult.outcome === 'dismissed') {
        console.log('User cancelled installation');
      } else {
        console.log('User added to home screen');
      }
    });
    deferredPrompt = null;
  }
}

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
