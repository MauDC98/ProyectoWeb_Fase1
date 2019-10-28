function crearMapa() {
    var map = L.map('map');
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    var inicialX = 9.9413325;
    var inicialY = -84.0427877;
    var finalX = 9.93807;
    var finalY = -84.0756986;
    var control = L.Routing.control({
        waypoints:[
            L.latLng(inicialX, inicialY),
            L.latLng(finalX, finalY)
        ],
        routeWhileDragging: true,
        geocoder: L.Control.Geocoder.nominatim()
    }).addTo(map);

    function createButton(label, container) {
        var btn = L.DomUtil.create('button', '', container);
        btn.setAttribute('type', 'button');
        btn.innerHTML = label;
        return btn;
    }

    map.on('click', function (e) {
        imprimirCoord(control.getWaypoints());
        var container = L.DomUtil.create('div'),
            startBtn = createButton('Start from this location', container);
        L.popup()
            .setContent(container)
            .setLatLng(e.latlng)
            .openOn(map);
        L.DomEvent.on(startBtn, 'click', function () {
            control.spliceWaypoints(0, 1, e.latlng);
            map.closePopup();
        });
    });

    var rutas = new Array();
    rutas = control.getWaypoints();    
    imprimirCoord(control.getWaypoints());
}

function crearMapaEmpresas() {
    var map1 = L.map('map1');
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map1);
    var inicialX = 9.9413325;
    var inicialY = -84.0427877;
    var finalX = 9.93807;
    var finalY = -84.0756986;
    var control = L.Routing.control({
        waypoints:[
            L.latLng(inicialX, inicialY),
            L.latLng(finalX, finalY)
        ],
        routeWhileDragging: true,
        geocoder: L.Control.Geocoder.nominatim()
    }).addTo(map1);

    function createButton(label, container) {
        var btn = L.DomUtil.create('button', '', container);
        btn.setAttribute('type', 'button');
        btn.innerHTML = label;
        return btn;
    }

    map.on('click', function (e) {
        imprimirCoord(control.getWaypoints());
        var container = L.DomUtil.create('div'),
            startBtn = createButton('Start from this location', container);
        L.popup()
            .setContent(container)
            .setLatLng(e.latlng)
            .openOn(map1);
        L.DomEvent.on(startBtn, 'click', function () {
            control.spliceWaypoints(0, 1, e.latlng);
            map.closePopup();
        });
    });

    var rutas = new Array();
    rutas = control.getWaypoints();    
    imprimirCoord(control.getWaypoints());
}

function imprimirCoord(rutas){
    for (var i = 0; i < rutas.length; i++) {
        console.log("X: " + rutas[i].latLng.lng + " " + "Y: " + rutas[i].latLng.lat);
    }
}


function cargarInfo(){

}