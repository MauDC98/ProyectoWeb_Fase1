<?php 
include "init.php";  

include "usuarioRegistrado.php";  
include "dataValidator.php";
?>
<?php 

if(!isset($_SESSION['id'])): ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>
<?php 
$dv = new dataValidator();
$ur = new usuarioRegistrado();
$requested = false;
$validData = false;
?>
<?php
if(isset($_POST['login'])){//cambiar esto y preguntar cómo funciona
    $requested = true;
    $ur->password = $_POST['password'];
    $dv->validarContraseñaLog($ur->password,$source);
    $dv->validarContrasenaVacio($ur->password);

  if($dv->validarPasswordLog()){

    $_SESSION["Contrasena"]= password_hash($data['newpassword'], PASSWORD_DEFAULT);
  if($source->Query("UPDATE usuario SET activo = 0 WHERE  id= ?" ,[$_SESSION["id"]])){
    $data['password_cambiada'] = "Cuenta Inabilitada con éxito!";
    $message = "Cuenta Inabilitada con éxito";
    header("location:login.php");
   $_SESSION['password_success'] = "Hi ". $_SESSION["nombreUsuarioActivo"]. " cuenta inhabilitada";


    
   
    

  }
 }
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Singup Form</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
 <div class="group">
      <h3 class="heading">Inabilitar cuenta</h3>
 </div>
 <div class="group">
      <input type="password" name="password" class="control" placeholder="Enter Old password..." value="<?php if(!empty($ur->password)): echo $ur->password; endif;?>">
      <div class="error">
        <?php if($requested):?>
          <?php $dv->validarPassword($ur->password);?>
        <?php endif;?>
      </div>
     </div>
  <div class="group m20">
      <input type="submit" name="login" class="btn" value="Modify &rarr;">

     </div>
</form>
   </div>
  </div>
 </div>


</body>
</html>