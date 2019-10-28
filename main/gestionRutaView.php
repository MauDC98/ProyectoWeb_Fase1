<?php
if (isset($_SESSION['id'])) { //para verificar si hay una sesión nula o no
  header("location:profile.php");
} ?>

<!DOCTYPE html>
<html>

<head>
  <title>Rutas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--CSS---------------------------------------------------------------------------CSS------>
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!--Leaflet-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
  <link rel="stylesheet" href="leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link rel="stylesheet" href="main.css">
  <!--------------------------------------------------------------------------------CSS------>

  <!--JS----------------------------------------------------------------------------JS------->
  <!--Bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="extensions/editable/bootstrap-table-editable.js"></script>
  <!--Leaflet-->
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <script src="leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.js"></script>
  <script src="leaflet-routing-machine-3.2.12/dist/leaflet.iconlabel.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="main.js"></script>
  <!--------------------------------------------------------------------------------JS------->
  <style></style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="d-flex flex-grow-1">
      <span class="w-100 d-lg-none d-block">
        <!-- hidden spacer to center brand on mobile --></span>
      <a class="navbar-brand" href="#">Rutas Addition</a>
      <div class="w-100 text-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
      <ul class="navbar-nav ml-auto flex-nowrap">
        <li class="nav-item">
          <a href="#" class="nav-link">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Menu de Opciones -->
  <ul class="nav nav-tabs justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#gestionarRuta">Gestionar Rutas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#gestionarEmpresa">Gestionar Empresas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#miPerfil">Mi Perfil</a>
    </li>
  </ul>

  <!-- Paneles principales -->
  <div class="tab-content">
    <!---------------------------------------------------------RUTAS-->
    <div class="tab-pane container active" id="gestionarRuta">
      <div class="container-fluid">
        <div class="row">
          <div id="mapPanel" class="col-lg-4">
            <!--------------------------------------MAPA--->
            <div id="map" class="map"></div>
            <script type="text/javascript">
              crearMapa()
            </script>
          </div>
          <!--------------------------------------------------------------------MAPA--->
          <div class="col-lg-8">
            <!--Opciones-->
            <div id="accordion">
              <div class="card">
                <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Editar Rutas
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="container mt-3">
                      <input class="form-control" id="myInput" type="text" placeholder="Search..">
                      <br>
                      <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <div id="table" class="table-editable">
                          <table class="table table-bordered table-hover table-responsive-md text-center">
                            <caption>Lista de Rutas Registradas</caption>
                            <thead class="thead-light">
                              <tr>
                                <th>No.</th>
                                <th>Descripción</th>
                                <th>Costo</th>
                                <th>Durac.</th>
                                <th>Discap.</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              <tr>
                                <td>R1</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>15 min.</td>
                                <td>Sí.</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R2</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R3</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R4</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R4</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R4</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>R4</td>
                                <td>San José-Heredia</td>
                                <td>520</td>
                                <td>10 min.</td>
                                <td>Sí</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <script type="text/javascript">
                          $(document).ready(function() {
                            $("#myInput").on("keyup", function() {
                              var value = $(this).val().toLowerCase();
                              $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                              });
                            });
                          });
                        </script>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card">
                <div class="text-white card-header">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    Agregar ruta
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    Form para agregar ruta
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane container fade" id="gestionarEmpresa">
      <!------------------EMPRESAS-->
      <div class="container-fluid">
        <div class="row">
          <div id="mapPanel" class="col-lg-4">
            <!--------------------------------------MAPA--->
            <div id="map1" class="map"></div>
            <script type="text/javascript">
              crearMapaEmpresas()
            </script>
          </div>
          <!--------------------------------------------------------------------MAPA--->
          <div class="col-lg-8">
            <!--Opciones-->
            <div id="accordion">
              <div class="card">
                <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Editar Empresas
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="container mt-3">
                      <input class="form-control" id="myInput" type="text" placeholder="Search..">
                      <br>
                      <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <div id="table" class="table-editable">
                          <table class="table table-bordered table-hover table-responsive-md text-center">
                            <caption>Lista de Empresas Registradas</caption>
                            <thead class="thead-light">
                              <tr>
                                <th>Nombre</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Horario de Atencion</th>
                                <th>Tel Emergencia</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              <tr>
                                <td>Lumaca</td>
                                <td>Cartago</td>
                                <td>San José</td>
                                <td>lumaca@info.com</td>
                                <td>2552-8898</td>
                                <td>11:00-3:00</td>
                                <td>150m S de CCSS</td>
                                <td>22229009</td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>
                              <tr>
                                <td>Tracopa</td>
                                <td>Puntarenas</td>
                                <td>San José</td>
                                <td>tracopa@info.com</td>
                                <td>2902-8818</td>
                                <td>10:00-7:00</td>
                                <td>50m N de Torre Eiffel</td>
                                <td>20023009</td>
                                <td>                          
                                  <span class="table-remove text-center"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Actualizar</button></span>
                                </td>
                                <td>
                                  <span class="table-remove text-center"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                                </td>
                              </tr>                              
                            </tbody>
                          </table>
                        </div>
                        <script type="text/javascript">
                          $(document).ready(function() {
                            $("#myInput").on("keyup", function() {
                              var value = $(this).val().toLowerCase();
                              $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                              });
                            });
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="text-white card-header">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    Agregar Empresa
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    Form para agregar una empresa
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="tab-pane container fade" id="miPerfil">
      <!----------------------------Perfil-->

    </div>

  </div>

  <!--<div id="mapid" class="mapid">
    Mapa---------------------------------
    <script type="text/javascript">
      //muestro el mapa con su respectivo zoom
      var map = L.map('mapid').setView([9.9198, -84.0527], 15);
      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);
      L.Routing.control({
        waypoints: [
          L.latLng(9.9413325, -84.0427877),
          L.latLng(9.9413325, -84.0427877),
          L.latLng(9.93807, -84.0756986)
        ],
        routeWhileDragging: false
      }).addTo(map);
    </script>
  </div>-->



</body>

</html>