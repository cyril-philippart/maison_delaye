function initMap() {
  let myPosition = { lat: 48.77768, lng: 2.29365 }
  map = new google.maps.Map(document.getElementById("map"), {
    center: myPosition,
    zoom: 19,
  });
}