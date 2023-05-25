  const findMyState = () =>
  {
    const status = document.querySelector('.status');

    // const success = (position) =>
    // {
    //   console.log(position)
    // }
    
    // const error = () =>
    // {
    //   status.textContent = "Unable to get location";
    // }
    
      navigator.geolocation.getCurrentPosition(
   function (position) {
      initMap(position.coords.latitude, position.coords.longitude)
   },
   function errorCallback(error) {
      console.log(error)
   }
);
    //navigator.geolocation.getCurrentPosition(success, error);

  }
  document.querySelector(".findLocation").addEventListener("click", findMyState);

  function initMap(lat, lng) {

   var myLatLng = {
      lat,
      lng
   };

   var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: myLatLng
   });

   var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
   });
}
// function initMap()
// {
  
//   const map = new google.maps.Map(document.getElementById('map'), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8
//   });

//   const searchInput = document.getElementById('search');
//   const searchBox = new google.maps.places.SearchBox(searchInput);
  
//   map.addListener('bounds_changed', () =>
//   {
//     searchBox.setBounds(map.getBounds());
//   });
  
//   searchBox.addListener('places_changed', () =>
//   {
//     const places = searchBox.getPlaces();
    
//     if (places.length === 0)
//     {
//       return;
//     }
    
//     const bounds = new google.maps.LatLngBounds();
//     places.forEach((place) =>
//     {
//       if (!place.geometry || !place.geometry.location)
//       {
//         console.log('Returned place contains no geometry');
//         return;
//       }
      
//       const marker = new google.maps.Marker({
//         map,
//         title: place.name,
//         position: place.geometry.location
//       });
      
//       bounds.extend(place.geometry.location);
//     });
    
//     map.fitBounds(bounds);
//   });
// }