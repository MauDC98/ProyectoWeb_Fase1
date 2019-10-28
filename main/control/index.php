<?php
include "init.php";
include "EmpresaRegistrada.php";
include "usuarioRegistrado.php";
include "dataValidator.php";
if(isset($_SESSION['id'])){//para verificar si hay una sesión nula o no
  header("location:profile.php");
}
$dv = new dataValidator();
$ur = new usuarioRegistrado();
$requested = false;
$validData = false;

if(isset($_POST['signup'])){

   $requested = true;
   $ur->name = $_POST['full_name'];
   $ur->Apellido1 = $_POST['Apellido1'];
   $ur->Apellido2 = $_POST['Apellido2'];
   $ur->email = $_POST['email'];
   $ur->password = $_POST['password'];
   $ur->nickname = $_POST['nickname'];
   $ur->telefono = $_POST['telefono'];
   $ur->confirm_password = $_POST['confirm'];    
   

      
   $dv->validarNombre($ur->name);
   $dv->validarApellido1($ur->Apellido1);
   $dv->validarApellido2($ur->Apellido2); 
   $dv->validarNickname($ur->nickname);
   $dv->validarPassword($ur->password);
   $dv->validarConfirmPassword($ur->confirm_password,$ur->password);
   $dv->validarEmail($ur->email,$source);
   $dv->validarTelefono($ur->telefono);
   if($dv->validData()){
     echo "Si entra a validar data";
     $ur->password = password_hash($ur->password, PASSWORD_DEFAULT);
     if($source->Query("INSERT INTO usuario(Nombre, Apellido1, Apellido2, Nickname, Contrasena, Email, Celular) VALUES (?,?,?,?,?,?,?)", [$ur->name, $ur->Apellido1, $ur->Apellido2,$ur->nickname, $ur->password, $ur->email,$ur->telefono])){
          $_SESSION['account_created'] = "Your account is successfully created";
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
      <h1 class="heading">Create account</h1>
     </div>
     <div class="group">
      <input type="text" name="full_name" class="control" placeholder="Enter your name..." value="<?php if(!empty($ur->name)): echo $ur->name; endif;?>">
      <div class="error">
        <?php                     
          if($requested):
            $dv->validarNombre($ur->name);         
        endif;
        ?>
      </div>
     </div>
     <div class="group">
      <input type="text" name="Apellido1" class="control" placeholder="Enter your first last name..." value="<?php if(!empty($ur->Apellido1)): echo $ur->Apellido1; endif; ?>">
      <div class="error">
        <!--validarData()-->
        <?php          
          if($requested):     
          $dv->validarApellido1($ur->Apellido1);
        endif;?>
      </div>
     </div>
     <div class="group">
      <input type="text" name="Apellido2" class="control" placeholder="Enter your second last name..." value="<?php if(!empty($ur->Apellido2)): echo $ur->Apellido2; endif; ?>">
      <div class="error">
        <?php if($requested):                  
         $dv->validarApellido2($ur->Apellido2);?>
        <?php endif;?>
      </div>
     </div>    
     <div class="group">
      <input type="text" name="nickname" class="control" placeholder="Create your user..." value="<?php if(!empty($ur->nickname)): echo $ur->nickname; endif; ?>">
      <div class="error">        
        <?php if($requested):?>
          <?php $dv->validarNickname($ur->nickname);?>
        <?php endif;?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Create your password..." value="<?php if(!empty($ur->password)): echo $ur->password; endif; ?>">
      <div class="error">        
         <?php if($requested): ?>
          <?php $dv->validarPassword($ur->password);?>
        <?php endif;?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="confirm" class="control" placeholder="Confirm your password..." value="<?php if(!empty($ur->confirm_password)): echo $ur->confirm_password; endif; ?>">
      <div class="error">
        <?php if($requested): 
         
        $dv->validarConfirmPassword($ur->confirm_password,$ur->password)?>
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