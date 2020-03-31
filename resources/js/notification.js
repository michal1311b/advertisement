var notifications = [];

const NOTIFICATION_TYPES = {
    follow: 'App\\Notifications\\UserFollowed',
    newPost: 'App\\Notifications\\NewPost',
    newMessage: 'App\\Notifications\\NewMessage',
    newForeignMessage: 'App\\Notifications\\NewForeignMessage',
    chatMessage: 'App\\Notifications\\ConversationNotification',
};

// check if there's a logged in user
if(Laravel.userId) {
    $.get('/offer/notifications', function (data) {
        addNotifications(data, "#notifications");
    });
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
        $(target + 'Menu').html('<li class="dropdown-header">'+Vue.prototype.trans('notifications.no-notifications')+'</li>');
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
    let to;
    var read = `?read=${notification.id}`;
    if(notification.type === NOTIFICATION_TYPES.follow) {
        to = 'offer/users' + read;
    } else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const postSlug = notification.data.slug;
        to = `offer/show/${postSlug}` + read;
    } else if(notification.type === NOTIFICATION_TYPES.newMessage) {
        const contactId = notification.data.contact_id;
        to = `user/contacts/${contactId}/reply` + read;
    } else if(notification.type === NOTIFICATION_TYPES.chatMessage) {
        const roomId = notification.data.room_id;
        to = `user/rooms/${roomId}` + read;
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
        text += `<li class="dropdown-header"><strong>${name}</strong> `+Vue.prototype.trans('notifications.publish-post')+`</li>`;
    } else if(notification.type === NOTIFICATION_TYPES.newMessage) {
        const email = notification.data.email;
        text += `<li class="dropdown-header"><strong>${email}</strong> `+Vue.prototype.trans('notifications.send-message')+`</li>`;
    } else if(notification.type === NOTIFICATION_TYPES.chatMessage) {
        text += `<li class="dropdown-header">`+Vue.prototype.trans('notifications.new-application')+`</li>`;
    }
    return text;
}