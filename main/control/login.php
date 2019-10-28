<?php 
  include "init.php"; 
  include "usuarioRegistrado.php";  
  include "dataValidator.php";
?>

<?php if(isset($_SESSION['id'])): ?>
  <?php header("location:profile.php"); ?>
  <?php endif; ?>
<?php 
$dv = new dataValidator();
$ur = new usuarioRegistrado();
$requested = false;
$validData = false;
?>

<?php

if(isset($_POST['login'])){

   $requested = true;
   $ur->email = $_POST['email'];
   $ur->password = $_POST['password'];
    
     
   $dv->validarCuenta($ur->email,$source);
   $dv->validarPassword($ur->password); 
   $dv->validarEmailVacio($ur->email);
   $dv->validarContraseñaLog($ur->password,$source);
   $dv->validarContrasenaVacio($ur->password);

  if($source->Query("SELECT * FROM usuario WHERE Email = ?", [$ur->email])){
    if($source->CountRows() > 0){
     $row = $source->Single();
     $id = $row->id;
     $db_password = $row->Contrasena;
     $name = $row->Nombre;
     $emailusuario = $row->Email;
     $activo = $row->activo;

     if($dv->validAccount()){
      echo "Si entra a validar data";
        if($dv->validarPasswordLog()){
      //AQUI PASA EL PASSGUOR

        $_SESSION["nombreUsuarioActivo"] = $name;
        $_SESSION["Contrasena"] = $db_password;
        $_SESSION['login_success'] = "Hi ". $_SESSION["nombreUsuarioActivo"]. " You have successfully logged in";
        $_SESSION["id"] = $id;
        $_SESSION["Email"] = $emailusuario;

        header("location:profile.php");

     } 
     

     
    } 

  }
   
  }
}

 

 /*
     * Submit the login form
 */ 
//arreglar esta parte porque seguimos usando data
 //if(empty($data['email_error']) && empty($data['password_error'])){
  
 //}




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="assets/css/style.css"> 
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
      <div class="group">
        <?php 
        
        if(isset($_SESSION['account_created'])):?>
          <div class="success">
            <?php echo $_SESSION['account_created']; ?>
          </div>
        <?php endif; ?>
        <?php unset($_SESSION['account_created']); ?>

         
      </div>
     <div class="group">
      <h3 class="heading">User Login</h3>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter your email.." value="<?php if(!empty($ur->email)): echo $ur->email; endif; ?>">
      <div class="error">
        <?php if($requested):?>
         <?php $dv->validAccount($ur->email,$source);?>
        <?php endif;?>
      </div>
    </div>         
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Enter your password..." value="<?php if(!empty($ur->password)): echo $ur->password; endif; ?>">
      <div class="error">        
         <?php if($requested):?>
          <?php $dv->validarPassword($ur->password);?>
        <?php endif;?>
      </div>
     </div>
     <div class="group m20">
      <input type="submit" name="login" class="btn" value="Login &rarr;">
     </div>
     <div class="group m20">
      <a href="index.php" class="link">Create new account?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>