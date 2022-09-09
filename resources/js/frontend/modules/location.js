var x = document.querySelector("#location");
async function getLocation() {
    if (navigator.geolocation) {
       await navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

async function showPosition(position) {
    x.innerHTML = position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
}
getLocation().then(r => console.log(r))
