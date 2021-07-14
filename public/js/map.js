let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 48.77768, lng: 2.29365 },
    zoom: 18,
  });
}