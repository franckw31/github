<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css"> 
    <link href="../dist/output.css" rel="stylesheet"> 
<style>
<body {
margin: 0;
padding: 0;
}
#map {
position: absolute;
top: 0;
bottom: 0;
left: 20;
right: 20;
width: 100%;
height: 70%;
background-color: #666;
align: top;
}
#marker {
<!-- background-image: url('https://docs.mapbox.com/mapbox-gl-js/assets/washington-monument.jpge'); -->
background-size: cover;
width: 125px;
height: 125px;
border-radius: 50%;
opacity: 0.8;
background-color: #666;
background: #666;
	color: #666;
	width: 250px;
	height: 250px;
    left: 55%;
    bottom:60px;
    top:auto;
    right:auto;
	border-radius: 50%;
    position:fixed;
    transform:none !important;
}

cursor: pointer;
}
.marker {
<!-- background-image: url('mapbox-icon.png'); -->
<!--background-size: cover; -->
width: 75px;
height: 75px;
border-radius: 50%;
background: #fff;
background-color: #fff;
opacity: 0.9;
cursor: pointer;
}
.mapboxgl-popup1 {
 min-width: 400px;
background-color: #666; 
background: black; 
border-radius: 50%;
}
.mapboxgl-popup-content {

text-align: center;
font-size: 18px;
background: #666;
background-color: #666; 
font-family: 'Open Sans', sans-serif;

color: #000;
    background-color: #fff;
    border-color: #666;
	
    max-width: 250px;
	width:80%;
	 min-width: 60px;
<!--    box-shadow: 3px 3px 2px #8B5D33; -->
    font-family: 'Oswald';
	left: 11%;
    bottom: 25%;
    top: auto;
    right: auto;
	opacity: 1;
    position:fixed;
    transform:none !important;
}
</style>
<style>
#menu {
background: #fff;
opacity: 0.8;
position: absolute;
z-index: 1;
top: 10px;
right: 10px;
border-radius: 3px;
width: 120px;
border: 1px solid rgba(0, 0, 0, 0.4);
font-family: 'Open Sans', sans-serif;
}
 
#menu a {
font-size: 13px;
color: #404040;
display: block;
margin: 0;
padding: 0;
padding: 10px;
text-decoration: none;
border-bottom: 1px solid rgba(0, 0, 0, 0.25);
text-align: center;
}
 
#menu a:last-child {
border: none;
}
 
#menu a:hover {
background-color: #f8f8f8;
color: #404040;
}
 
#menu a.active {
background-color: #3887be;
opacity: 0.7;
color: #ffffff;
}
 
#menu a.active:hover {
background: #3074a4;
}

.mapboxgl-map .mapboxgl-popup {
	
	min-width: 30%;
	min-height: 17%;
    left: 20%;
    bottom: 50px;
    top: auto;
    right: auto;
	opacity: 0.7;
    position:fixed;
    transform:none !important;
}
.mapboxgl-map .mapboxgl-popup-tip{display:none}

</style>

</head>
<body>
<!--    <div class="flex font-sans">   <div class="h-screen w-full" id="map"></div> </div>  -->
   <?php


<table width='66%'height='12%' border='1' align='center'>

	<tr bgcolor='yellow'>
	
		<td align='center'><a href="joueurs.php">Prénom</a></td>
		<td align='center'><a href="joueursbypts.php">Nb Points</td>
		<td align='center'>Password</td>
		<td align='center'><a href="joueursbyid.php">ID</a></td>
		<td align='center'>Action</td>	
	</tr>
	
	</table>
	?>
<nav id="menu"></nav>
<div id="map"></div>

	
	<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
<!--    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet"/> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmNrdzMxIiwiYSI6ImNsbmJqemU5cjA0MDYya3RkczNrMHdqb2wifQ.6NLEMz-lShL80j9QuGW9cA';
		const symbo = `url(https://placekitten.com/g/100/100/)`;
        var map = new mapboxgl.Map({
            container: 'map',
			style: 'mapbox://styles/franckw31/clnd1m23b03o501qu3x5ab4xk',			
            center: [1.42056, 43.60842],
            zoom: 10,
			attributionControl: false
        });

			// create the popup			
			// create DOM element for the marker

			map.on('load', function () {
            //place object we will add our events to
            map.addSource('Activités',{
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': []								
                }
            });
					
            //add place object to map
            
			map.addLayer({
                'id': 'Activités',
                'type': 'symbol',
                'source': 'Activités',
                'layout': {
                    'icon-image': '{icon}',
					'icon-size': 0.25,
                    'icon-allow-overlap': true,
					'visibility': 'visible'},
				'paint': {
					'icon-opacity': 0.7}
            });
			map.addSource('membres', {
				type: 'vector',
				url: 'mapbox://mapbox.2opop9hr'
			});
			
			map.addLayer({
				'id': 'membres',
				'type': 'circle',
				'source': 'membres',
				'layout': {
					// Make the layer visible by default.
					'visibility': 'visible'
					},
				'paint': {
					'circle-radius': 8,
					'circle-color': 'rgba(55,148,179,1)'
					},
				'source-layer': 'museum-cusco'
				});		
            //Handle popups
						
			map.on( 'click','Activités', (e) => { map.flyTo({center: e.features[0].geometry.coordinates,zoom: 14});
				const symbo = e.features[0].properties.t2;
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description ;
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }
            
		    const el = document.createElement('div');
				el.id = 'marker';	
				el.style.backgroundImage = `${symbo}`;
				el.style.width = `150px`;
				el.style.height = `150px`;
				el.style.opacity = `0.5`;
				el.style.backgroundSize = `100%`;
			
			new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(description)
                .addTo(map);		
				
			new mapboxgl.Marker(el)
				.setLngLat(coordinates)
			<!--	.setPopup(new mapboxgl.Popup({ offset: 25,closeOnClick: true }).setLngLat(coordinates).setHTML(description)) -->
				.setPopup(new mapboxgl.Popup({ offset: 25,closeOnClick: true }).setLngLat(coordinates))
				.addTo(map);			      
			});

            //Handle pointer styles
            map.on('mouseenter', 'Activités', () => {
                map.getCanvas().style.cursor = 'pointer';
								
            });
            map.on('mouseleave', 'Activités', () => {
                map.getCanvas().style.cursor = '';
				
            });

            //get our data from php function
            getAllEvents();
			
				
			
            });

        function getAllEvents(){
            $.ajax({
				url: "sql2map.php",
                contentType: "application/json",
                dataType: "json",
                success: function (eventData) {
                    console.log(eventData)
                    map.getSource('Activités').setData({
                            'type': 'FeatureCollection',
                            'features': eventData
                    });
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
      
// After the last frame rendered before the map enters an "idle" state.
// const popup = new mapboxgl.Popup({ offset: 37, anchor: 'bottom' }).setDOMContent('<h5>Hello</h5>').setLngLat('[1.42056, 43.60842]').addTo(map);

map.on('idle', () => {
// If these two layers were not added to the map, abort
if ( !map.getLayer('membres') || !map.getLayer('Activités') ) {
return;
}
 
// Enumerate ids of the layers.
const toggleableLayerIds = ['Activités', 'membres'];
// const toggleableLayerIds = ['membres','test','Activités'];
 
// Set up the corresponding toggle button for each layer.
for (const id of toggleableLayerIds) {
// Skip layers that already have a button set up.
if (document.getElementById(id)) {
continue;
}
 
// Create a link.
const link = document.createElement('a');
link.id = id;
link.href = '#';
link.textContent = id;
link.className = 'active';
 
// Show or hide layer when the toggle is clicked.
link.onclick = function (e) {
const clickedLayer = this.textContent;
e.preventDefault();
e.stopPropagation();
 
const visibility = map.getLayoutProperty(
clickedLayer,
'visibility'
);
 
// Toggle layer visibility by changing the layout object's visibility property.
if (visibility === 'visible') {
map.setLayoutProperty(clickedLayer, 'visibility', 'none');
this.className = '';
} else {

this.className = 'active';
map.setLayoutProperty(
clickedLayer,
'visibility',
'visible'
);
}
};
 
const layers = document.getElementById('menu');
layers.appendChild(link);
}
});
map.addControl(new mapboxgl.ScaleControl());
  
map.addControl(new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
// When active the map will receive updates to the device's location as it changes.
trackUserLocation: true,
// Draw an arrow next to the location dot to indicate which direction the device is heading.
showUserHeading: true
}),'top-left'
);
 
const nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'top-left');
const popup = new mapboxgl.Popup({ closeOnClick: true })
.setLngLat([1.45, 43.5])
.setHTML('<h1>Cliquer sur les AS !</h1>')
.addTo(map);

 </script>
 
</body>

</html>