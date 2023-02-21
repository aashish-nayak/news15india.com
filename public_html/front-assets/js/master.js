function onManageWebPushSubscriptionButtonClicked(event) {
    getSubscriptionState().then(function(state) {
        if (state.isPushEnabled) {
            /* Subscribed, opt them out */
            OneSignal.setSubscription(false);
        } else {
            if (state.isOptedOut) {
                /* Opted out, opt them back in */
                OneSignal.setSubscription(true);
            } else {
                /* Unsubscribed, subscribe them */
                OneSignal.registerForPushNotifications();
            }
        }
    });
    event.preventDefault();
}

function updateMangeWebPushSubscriptionButton(buttonSelector) {
    var hideWhenSubscribed = false;
    var subscribeText = "<i class='fas fa-bell'></i> Notifications";
    var unsubscribeText = "<i class='fas fa-bell'></i> Unsubscribe";

    getSubscriptionState().then(function(state) {
        var buttonText = !state.isPushEnabled || state.isOptedOut ? subscribeText : unsubscribeText;

        var element = document.querySelector(buttonSelector);
        if (element === null) {
            return;
        }

        element.removeEventListener('click', onManageWebPushSubscriptionButtonClicked);
        element.addEventListener('click', onManageWebPushSubscriptionButtonClicked);
        element.innerHTML = buttonText;

        if (hideWhenSubscribed && state.isPushEnabled) {
            element.style.display = "none";
        } else {
            element.style.display = "";
        }
    });
}

function getSubscriptionState() {
    return Promise.all([
        OneSignal.isPushNotificationsEnabled(),
        OneSignal.isOptedOut()
    ]).then(function(result) {
        var isPushEnabled = result[0];
        var isOptedOut = result[1];

        return {
            isPushEnabled: isPushEnabled,
            isOptedOut: isOptedOut
        };
    });
}
var OneSignal = OneSignal || [];
var buttonSelector = "#my-notification-button";
OneSignal.push(function() {
    OneSignal.init({
        appId: "cbefd7e8-4e65-4c64-b36b-f27f27641b63",
    });
    if (!OneSignal.isPushNotificationsSupported()) {
        return;
    }
    updateMangeWebPushSubscriptionButton(buttonSelector);
    OneSignal.on("subscriptionChange", function(isSubscribed) {
        updateMangeWebPushSubscriptionButton(buttonSelector);
    });
});

function clipboardCopy(that) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(that).data('copy')).select();
    document.execCommand("copy");
    $temp.remove();
    $(that).attr('data-original-title', 'Copied!');
    $(that).tooltip('show');
    setTimeout(() => {
        $(that).attr('data-original-title', 'Copy To ClipBoard');
    }, 500);
}
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});