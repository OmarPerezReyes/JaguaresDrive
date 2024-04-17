// Importar la librería de Google Maps
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9TPtQVo1d15jPaORSaA082SlBqiv_f8s&libraries=places"></script>

// Función para convertir una dirección a coordenadas
function convertirDireccionADireccion() {
    // Dirección a convertir
    var direccion = "Fraccionamiento Familias Fuertes Cd. Victoria Tamps.";

    // Crear un objeto Geocoder
    var geocoder = new google.maps.Geocoder();

    // Llamar a la función geocode con la dirección especificada
    geocoder.geocode({ 'address': direccion }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            // Obtener las coordenadas de la dirección
            var coordenadas = results[0].geometry.location;

            // Mostrar las coordenadas en consola
            console.log("Coordenadas: " + coordenadas.lat() + ", " + coordenadas.lng());
        } else {
            // Manejar el error si la dirección no se pudo convertir
            console.log("Error: No se pudo convertir la dirección");
        }
    });
}

// Llamar a la función para convertir la dirección a coordenadas
convertirDireccionADireccion();
