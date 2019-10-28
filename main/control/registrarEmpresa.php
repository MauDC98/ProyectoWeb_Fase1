<?php 
include "init.php";
include "EmpresaRegistrada.php";
include "dataValidatorEmpresa.php";
if(isset($_SESSION['id'])){//para verificar si hay una sesión nula o no
  header("location:profile.php");
}
$dv = new dataValidatorEmpresa();
$ur = new EmpresaRegistrada();
$requested = false;
$validData = false;

if(isset($_POST['signup'])){

   $requested = true;
   $ur->nameEmpresa = $_POST['full_name'];
   $ur->origen = $_POST['origen'];
   $ur->destino = $_POST['destino'];
   $ur->email = $_POST['email'];
   $ur->telefono = $_POST['telefono'];
   $ur->direccion = $_POST['direccion'];
   $ur->horaatencioninicio = $_POST['horaatencioninicio'];
   $ur->horaatencionfinal = $_POST['horaatencionfinal'];
   $ur->numreporte = $_POST['numreporte']; 
   

      
   $dv->validarNombre($ur->nameEmpresa);
   $dv->validarOrigen($ur->origen);
   $dv->validarDestino($ur->destino); 
   $dv->validarEmail($ur->email,$source);
   $dv->validarDireccion($ur->direccion);
   $dv->validarAtencioninicio($ur->horaatencioninicio);
   $dv->validarAtencionfinal($ur->horaatencionfinal);
   $dv->validarTelefono($ur->telefono);
   $dv->validarTelefonoEmergencia($ur->numreporte);

   if($dv->validData()){
     echo "Si entra a validar data";
     if($source->Query("INSERT INTO empresa(Nombre, Origen, Destino, email, telefono, direccion, atencioninicio, atencionfinal,teflemergencia) VALUES (?,?,?,?,?,?,?,?,?)", [$ur->nameEmpresa, $ur->origen, $ur->destino,$ur->email, $ur->telefono, $ur->direccion,$ur->horaatencioninicio,$ur->horaatencionfinal,$ur->numreporte])){
          $_SESSION['account_created'] = "Your Company is successfully created";
          header("location:login.php");
     }
   }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Sing Up</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
     <div class="group">
      <h1 class="heading">Company Register</h1>
     </div>
     <div class="group">
      <input type="text" name="full_name" class="control" placeholder="Enter a name..." value="<?php if(!empty($ur->nameEmpresa)): echo $ur->nameEmpresa; endif;?>">
      <div class="error">
        <?php
          
  
         
          if($requested):
            $dv->validarNombre($ur->nameEmpresa);
         
        endif;
        ?>
      </div>
     </div>
     <div class="group">
      <input type="text" name="origen" class="control" placeholder="Enter origin point..." value="<?php if(!empty($ur->origen)): echo $ur->origen; endif; ?>">
      <div class="error">
        <!--validarData()-->
        <?php
          
          if($requested):
       
          $dv->validarOrigen($ur->origen);
        endif;?>
  
      </div>
     </div>
     <div class="group">
      <input type="text" name="destino" class="control" placeholder="Enter a destination point..." value="<?php if(!empty($ur->destino)): echo $ur->destino; endif; ?>">
      <div class="error">
        <?php if($requested): 
          
         $dv->validarDestino($ur->destino);?>
        <?php endif;?>
      </div>
     </div>    
     <div class="group">
      <input type="text" name="direccion" class="control" placeholder="Adress..." value="<?php if(!empty($ur->direccion)): echo $ur->direccion; endif; ?>">
      <div class="error">        
        <?php if($requested):?>
          <?php $dv->validarDireccion($ur->direccion);?>
        <?php endif;?>
      </div>
     </div>
     <div class="group">
      <input type="time" name="horaatencioninicio" class="control" placeholder="Hora inicio de atención" value="<?php if(!empty($ur->horaatencioninicio)): echo $ur->horaatencioninicio; endif; ?>">
      <div class="error">        
         <?php if($requested): ?>
          <?php $dv->validarAtencioninicio($ur->horaatencioninicio);?>
        <?php endif;?>
      </div>
     </div>
    <div class="group">
      <input type="time" name="horaatencionfinal" class="control" placeholder="Hora final de atención " value="<?php if(!empty($ur->horaatencionfinal)): echo $ur->horaatencionfinal; endif; ?>">
      <div class="error">        
         <?php if($requested): ?>
          <?php $dv->validarAtencionfinal($ur->horaatencionfinal);?>
        <?php endif;?>
      </div>
     </div>
     <div class="group">
      <input type="int" name="numreporte" class="control" placeholder="Emergency Number..." value="<?php if(!empty($ur->numreporte)): echo $ur->numreporte; endif; ?>">
      <div class="error">
        <?php if($requested): 
         
        $dv->validarTelefonoEmergencia($ur->numreporte)?>
        <?php endif;?>        
      </div>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter your email..." value="<?php if(!empty($ur->email)): echo $ur->email; endif; ?>">
      <div class="error">
        <?php if($requested): 
         
          $dv->validarEmail($ur->email,$source)?>
        <?php endif;?>
      </div>
    </div>          
     <div class="group">
      <input type="int" name="telefono" class="control" placeholder="Enter a phone number..." value="<?php if(!empty($ur->telefono)): echo $ur->telefono; endif; ?>">
      <div class="error">
        <?php if($requested): 
         
          $dv->validarTelefono($ur->telefono)?>
        <?php endif;?>        
      </div>    
     </div>
     
     <div class="group m20">
      <input type="submit" name="signup" class="btn" value="Create account &rarr;">
     </div>
     <div class="group m20">
      <a href="login.php" class="link">Already have an account ?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>