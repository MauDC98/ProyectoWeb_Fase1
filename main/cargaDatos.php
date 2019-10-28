<?php
function prueba(){
    $dataSourse =  dataSource::getInstance();
    $query = "select * from usuario";
    $result = $dataSourse->getConn()->query($query);
    //echo $dataSourse->closeConn();
    
    echo "
     <table border = 1 cellspacing = 1 cellpadding = 1>
         <tr>
             <th>ID</th>
             <th>Nombre</th>
             <th>Apellido</th>
         </tr>";
    while ($row = $result->fetch_assoc()){
        echo "
         <tr>
             <td>".$row["idusuario"]."</td>
             <td>".$row["Nombre"]."</td>
             <td>".$row["Apellido"]."</td>
         </tr>";
    }
    echo "</table>";
    }
    
    prueba();
?>