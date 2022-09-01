import $ from "jquery";

window.notification = (id) => {
    readNotification(id)
}

let readNotification = (notification) => {
    $.ajax({
        type: "post",
        url: "notification/" + notification,
        data: {
            notification: notification,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        delay: 220,
        autofocus: true,
        success: function (response) {
            window.setInterval(function() {
                $('div.alert').addClass('alert-dismissible')
            }, 1000);
        }
    })
}
