function initMap() {
  const map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8
  });
  
  const searchInput = document.getElementById('search');
  const searchBox = new google.maps.places.SearchBox(searchInput);
  
  map.addListener('bounds_changed', () => {
    searchBox.setBounds(map.getBounds());
  });
  
  searchBox.addListener('places_changed', () => {
    const places = searchBox.getPlaces();
    
    if (places.length === 0) {
      return;
    }
    
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log('Returned place contains no geometry');
        return;
      }
      
      const marker = new google.maps.Marker({
        map,
        title: place.name,
        position: place.geometry.location
      });
      
      bounds.extend(place.geometry.location);
    });
    
    map.fitBounds(bounds);
  });
}
