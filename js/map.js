geoCodeKey = "AIzaSyCnpKth2TNOR-N18LXYrroBJjjEh1uyU1Q";
mapsKey = "AIzaSyASjvIGTjQqr8EiatY03Or1P0ujenoKD-I";

let infoWindow;
let userAddress;
function initMap() {
  //Coordinates of ODR's
  var redDeer = { lat: 52.269585, lng: -113.813091 };
  var rink_1 = { lat: 52.299264, lng: -113.822047 };
  var geocoder = new google.maps.Geocoder();
  var map = new google.maps.Map(document.getElementById("map "), {
    zoom: 17,
    center: rink_1,
  });

  
  // //Markers for ODR
  // for (i = 0; i < rinks.length; i++)
  // {
  //    var rink_data = rinks[i];
  //    var name = rink_data[0];
  //    var lat = rink_data[3];
  //    var lng = rink_data[4];

  //    var marker = new google.maps.Marker({
  //       position: new google.maps.LatLng(lat, lng),
  //       map: map,
  //       icon: {
  //          url: "Images/hockeyPin32.png",
  //          labelOrigin: new google.maps.Point(30, 40),
  //          size: new google.maps.Size(32, 32),
  //          anchor: new google.maps.Point(16, 32)},
  //       title: name,
  //       label: {
  //          text: name,
  //          color: "#C70E20",
  //          fontWeight: "bold"
  //       }
  // });

  let rinkMarker1 = new google.maps.Marker({
    position: rink_1,
    map: map,
    icon: {
      url: "Images/hockeyPin32.png",
      labelOrigin: new google.maps.Point(30, 40),
      size: new google.maps.Size(32, 32),
      anchor: new google.maps.Point(16, 32),
    },
    label: {
      text: "Normandeau Ice Rink",
      color: "#C70E20",
      fontWeight: "bold",
    },
    title: "Normandeau Ice Rink",
  });

  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
  
  locationButton.textContent = "Get My Location";
  locationButton.classList.add("custom-map-control-buttom");
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          
          //Reverse geocode lat and long
          geocodeLatLng(geocoder, map, infoWindow);

          
        
          //fill origin input box with current address
          var origin = document.getElementById("origin");
          origin.value = pos.lat + ", " + pos.lng;
         
         //Set info window on map
         infoWindow.open(map);
         infoWindow.setContent(userAddress);
         
         map.setCenter(pos);
         let userMark = new google.maps.Marker({
            position: pos,
            map: map,
            icon: {
              labelOrigin: new google.maps.Point(30, 40),
              size: new google.maps.Size(32, 32),
              anchor: new google.maps.Point(16, 32),
            },
            label: {
              text: "Your Location",
              color: "#C70E20",
              fontWeight: "bold",
            },
            title: "Your Location",
          });
        },
        () => {
          HandleLocationError(true, infoWindow, map.getCenter());
        }
      );
      
    } else {
      // Browser doesn't support Geolocation
      HandleLocationError(false, infoWindow, map.getCenter());
    }
  });

  function HandleLocationEroror(browsersHasGeoLocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browsersHasGeoLocation
        ? "Error: The Geolocation service failed."
        : "ErrorL Your browser doesnt support geolocation."
    );
    infoWindow.open(map);
   
  }
  window.initMap = initMap;


 function geocodeLatLng(geocoder, map, infoWindow)
  {
    const value = document.getElementById("origin").value;
    userAddress = "";
    //Split lat and lng
    const latlngStr = value.split(",", 2);

    const latlng = {
      lat: parseFloat(latlngStr[0]),
      lng: parseFloat(latlngStr[1]),
    };
    geocoder.geocode({ location: latlng })
      .then((response) => response).then(data => {
         console.log(data);
         let parts = data.results[0].address_components;
         console.log(parts.slice(0,3));
         parts = parts.slice(0,3);
         
         parts.forEach(Element => {   
            userAddress += Element["long_name"]+ " ";
         });
      
         userAddress.trim();
         console.log(userAddress);
         
      });
 
      return userAddress;

  }
}
