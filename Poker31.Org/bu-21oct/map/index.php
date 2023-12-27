<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo: Add custom markers in Mapbox GL JS</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet"/>

<style>
body {
margin: 0;
padding: 0;
}
#map {
position: absolute;
top: 0;
bottom: 0;
width: 100%;
}
.marker {
<!-- background-image: url('mapbox-icon.png'); -->
background-image: url('/joker.png');
background-size: cover;
text-color: #000000;
width: 150px;
height: 150px;
border-radius: 50%;
cursor: pointer;
}
.mapboxgl-popup {
	background-image: url('/joker.png');
	opacity: 0.5;
	text-color: #000000;
	width: 400px;
    height: 300px;
max-width: 400px;
}
.mapboxgl-popup-content {
text-align: center;
text-color: #000000;
background-image: url('/joker.png');
font-family: 'Open Sans', sans-serif;
}
</style>

</head>
<body>
<div id="map"></div>
$zoom=11; 
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmNrdzMxIiwiYSI6ImNsbmJqemU5cjA0MDYya3RkczNrMHdqb2wifQ.6NLEMz-lShL80j9QuGW9cA';
 
const geojson = {
'type': 'FeatureCollection','features': [
{'type': 'Feature','geometry': {'type': 'Point','coordinates': [1.49956, 43.65842]},
 'properties': {'title': 'Mapbox','description': 'Washington, D.C.','iconSize': [90, 60]}},
 
{'type': 'Feature','geometry': {'type': 'Point','coordinates': [1.47956, 43.65842]},
 'properties': {'title': 'Mapbox','description': 'Paris, D.C.','iconSize': [90, 60]}}, 
 
{'type': 'Feature','geometry': {'type': 'Point','coordinates': [1.47956, 43.60842]},
 'properties': {'title': 'Mapbox','description': '<a href="http://poker31.org/panel/voir-partie.php?uid=32">Cashagame 1-2</a>','iconSize': [90, 60]}}
]};
 
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v12',
center: [1.42556, 43.60842],
zoom: 11
});
const nav = new mapboxgl.NavigationControl({
visualizePitch: true
});
map.addControl(nav, 'bottom-right');
 
// add markers to map
for (const feature of geojson.features) {
// create a HTML element for each feature
const el = document.createElement('div');
const width = marker.properties.iconSize[0];
const height = marker.properties.iconSize[1];
el.className = 'marker';
el.style.backgroundImage = `url(https://placekitten.com/g/${width}/${height}/)`;
el.style.width = `${width}px`;
el.style.height = `${height}px`;
el.style.backgroundSize = '100%';
 
// make a marker for each feature and add it to the map
//new mapboxgl.Marker({
//color: 'blue',
//draggable: true
//})
new mapboxgl.Marker(el)
.setLngLat(feature.geometry.coordinates)
.setPopup(
new mapboxgl.Popup({ offset: 25 }) // add popups
.setHTML(
// `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
`<h3><p>${feature.properties.description}</p></h3>`
)
)
.addTo(map);
}
</script>
</body>
</html>