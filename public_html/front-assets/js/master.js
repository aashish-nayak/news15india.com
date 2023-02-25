window.OneSignal = window.OneSignal || [];
OneSignal.push(function(){
    OneSignal.init({
        appId : "9dd3f3d5-5f35-472f-987e-be0a4262510e",
        safari_web_id : "web.onesignal.auto.017d7a1b-f1ef-4fce-a00c-21a546b5491d",
        notifyButton : {
            enable :true,
        },
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