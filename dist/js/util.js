function getLocation() {
  if (navigator.geolocation) {
    var latLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        latLong = position.coords.latitude + ',' + position.coords.longitude
    });
    return latLong
  }
}
