var map = L.map('map',
    {
        zoom: 15
    }).setView([3.424967764829511, -76.49883270263673]);           ////SE INSERTA UN MAPA EN EL DIV "map" con coordenadas 3.42335,-76.52086


// seccion de mapa base-------------------------------------------------------

var mapabase = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        maxZoom: 20,

        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

var mapabase2 = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

mapabase.addTo(map);

//script para el php
function del(b) 
		{	
			$.post("php_scripts/ejemplo2.php",
				{
					peticion:'borrar_admin', 
					parametros: {gid:b}
				},
				function(data, status){
					console.log("Datos recibidos: " + data + "\nStatus: " + status);
					if(status=='success')
					{
						alert("reporte borrado");
						//location.reload();
					}
				});	
			//Para cerrar la ventana modal	
		};		
		
//----------------------------------------
let currentMarker;

function zoomToLocation(lat, lng) {
	if (currentMarker) {
	  map.removeLayer(currentMarker);
	}
	// Creación de marcador en el punto 
	
	currentMarker = L.marker([lat, lng]).addTo(map);
	map.flyTo([lat, lng], 18);
  }