let infoWindow;

   function initMap() {
     

      //Coordinates of ODR's
      let redDeer = {lat: 52.269585, lng: - 113.813091}
      let rink_1 = {lat: 52.299264, lng: -113.822047}
    



      let map = new google.maps.Map(document.getElementById("map"), {zoom: 17, center: rink_1});
      let redDeerMarker= new google.maps.Marker({position: redDeer, map: map});							
      
      //User marker
      //let userMarker = new google.maps.Marker({position: userCoords, map: map });
      //Markers for ODR
      let rinkMarker1 = new google.maps.Marker({ 
         position: rink_1, 
         map: map, 
         icon: {
            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
            labelOrigin: new google.maps.Point(85, 32),
            size: new google.maps.Size(32, 32),
            anchor: new google.maps.Point(16, 32)},
         label: {
            text: "Normandeau Ice Rink",
            color: "#C70E20",
            fontWeight: "bold"
         },
         title: "Normandeau Ice Rink"});

      infoWindow = new google.maps.InfoWindow();
      const locationButton = document.createElement("button");

      locationButton.textContent = "Get My Location";
      locationButton.classList.add("custom-map-control-buttom");
      map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
      locationButton.addEventListener("click", () =>
      {
         // Try HTML5 geolocation.
         if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
            (position) => {
               const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
               };

               infoWindow.setPosition(pos);
               infoWindow.setContent("Location found.");
               infoWindow.open(map);
               map.setCenter(pos);
            },
            () => {
               handleLocationError(true, infoWindow, map.getCenter());
            }
            );
         } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
         }
      });
}	

function HandleLocationEroror(browsersHasGeoLocation, infoWindow, pos)
{
   infoWindow.setPosition(pos);
   infoWindow.setContent(
      browsersHasGeoLocation
         ? "Error: The Geolocation service failed."
         : "ErrorL Your browser doesnt support geolocation."
   );
   infoWindow.open(map);
      
}
window.initMap = initMap;
   
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
     let userCoords = navigator.geolocation.getCurrentPosition();
  } else
  { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

let directionsService = new google.maps.DirectionsService();
let directionRenderer = new google.maps.DirectionsRenderer.setMap(map);
