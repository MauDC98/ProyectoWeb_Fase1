<?php
class dataSource {
    private $conexion;
    private static $instancia = null;

    private function __costruct(){  //tengo dudas con el constructor privado

    }

    

    public function getInstance(){
        if (self::$instancia==null){
            self::$instancia=new DataSource();
        }
        return self::$instancia;
    }

    public function getConn(){
        $servidor = 'localhost'; //servidor de la BD
        $usuario = 'root'; //nombre del usuario de la BD
        $password = '';//contraseña del usuario
        $bd = 'prueba'; //nombre de la BD
        $this->conexion = new mysqli($servidor,$usuario,$password,$bd);
        $this->conexion->set_charset('utf8');
        if(!$this->conexion->connect_errno){
            return $this->conexion; // se devuelve al conexion
        } else{
            echo "No se ha podido realizar la coneccion a la base de datos";
            return null;
        }  
    }


    public function closeConn(){
        $this->conexion->close();
        $this->conexion=null;
        return true;
    }


    
}



/*function prueba(){
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

prueba();*/

/*
 $id = 1;
 $conn = mysqli_connect('localhost','root','','practicas');
 $sql = "SELECT * FROM usuario WHERE id_user = '".$id."'";
 $result = mysqli_query($conn,$sql);
 echo "
     <table border = 1 cellspacing = 1 cellpadding = 1>
         <tr>
             <th>ID</th>
             <th>Nombre</th>
             <th>Apellidos</th>
             <th>Edad</th>
         </tr>";
 while($row = mysqli_fetch_array($result)){
     echo "
         <tr>
             <td>".$row[0]."</td>
             <td>".$row[1]."</td>
             <td>".$row[2]."</td>
             <td>".$row[3]."</td>
         </tr>";
 }
 echo "</table>";
 */
?>