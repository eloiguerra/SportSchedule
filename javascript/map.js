function initMap(latitude, longitude) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitude, lng: longitude},
        zoom: 16
    });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log("Geolocation is not supported by this browser.");
        return false;
    }
}
  
function showPosition(position) {
    let latitude = position.coords.latitude
    let longitude = position.coords.longitude;
    
    initMap(latitude, longitude);
}