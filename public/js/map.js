var mymap = L.map('map').setView([48.777674, 2.293651], 15);

L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 10,
    maxZoom: 20,
}).addTo(mymap);

var marker = L.marker([48.777674, 2.293651]).addTo(mymap);

marker.bindPopup("<span>AU PORCELET ROSE</span><br><aside>41 rue Houdan, 92230 Sceaux</aside>");


