if(localStorage.getItem("token")) {
    let decoded = jwt_decode(localStorage.getItem("token"));
    window.Echo.private(`App.User.`+decoded.sub)
        .notification((notification) => {
            console.log(notification);
        });
}
