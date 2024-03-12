function initMap() {
    iniciarMap();
    iniciarMap2();
}

function iniciarMap() {
  // Configura el mapa
  var mapOptions = {
      center: { lat: 23.728058, lng: -99.077465 },
      zoom: 12, 
  };

  // Crea el mapa
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  // Configura la solicitud de direcciones
  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);

  // Define los puntos de inicio y fin y los puntos intermedios (waypoints)
  var start = new google.maps.LatLng(23.719308, -99.104366); // Ubicación de inicio
  var end = new google.maps.LatLng(23.729029, -99.077182); // Ubicación de fin
  var waypoint1 = new google.maps.LatLng(23.721360, -99.078390); // Ubicación del waypoint

  // Configura los waypoints en un arreglo
  var waypoints = [
      {
          location: waypoint1,
          stopover: true // Define si el waypoint es una parada o solo una ubicación intermedia
      }
  ];

  // Configura la solicitud de ruta
  var request = {
      origin: start,
      destination: end,
      waypoints: waypoints,
      travelMode: 'DRIVING' // Modo de viaje para trazo de ruta
  };

  // Obtiene la ruta y muestra en el mapa
  directionsService.route(request, function(response, status) {
      if (status === 'OK') {
          directionsRenderer.setDirections(response);
      } else {
          window.alert('Error al mostrar las direcciones: ' + status);
      }
  });
}

function iniciarMap2() {
    // Configura el mapa
    var mapOptions = {
        center: { lat: 23.728058, lng: -99.077465 },
        zoom: 12, 
    };

    // Crea el mapa
    var map2 = new google.maps.Map(document.getElementById('map2'), mapOptions);

    // Configura la solicitud de direcciones
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map2);

    // Define los puntos de inicio y fin y los puntos intermedios (waypoints)
    var start = new google.maps.LatLng(23.789308, -99.104366); // Ubicación de inicio
    var end = new google.maps.LatLng(23.729029, -99.077182); // Ubicación de fin
    var waypoint1 = new google.maps.LatLng(23.721360, -99.078390); // Ubicación del waypoint

    // Configura los waypoints en un arreglo
    var waypoints = [
        {
            location: waypoint1,
            stopover: true // Define si el waypoint es una parada o solo una ubicación intermedia
        }
    ];

    // Configura la solicitud de ruta
    var request = {
        origin: start,
        destination: end,
        waypoints: waypoints,
        travelMode: 'DRIVING' // Modo de viaje para trazo de ruta
    };

    // Obtiene la ruta y muestra en el mapa
    directionsService.route(request, function(response, status) {
        if (status === 'OK') {
            directionsRenderer.setDirections(response);
        } else {
            window.alert('Error al mostrar las direcciones: ' + status);
        }
    });
}
