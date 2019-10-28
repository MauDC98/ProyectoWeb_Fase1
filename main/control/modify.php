<?php include "init.php"; ?>
<?php include "data.php"; ?>
<?php include "usuarioActivo.php"; ?>

<?php 

if(!isset($_SESSION['id'])): ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>
<?php
if(isset($_POST['login'])){
$data = [
     
     'password'       => $_POST['password'],
     'email_error'    => '',
     'newpassword' => $_POST['newpassword'],
     'password_error' => '',
     'password_cambiada' => ''

 ];


 //"UPDATE usuario SET Contrasena = ? WHERE  Email= ?" , [$data['newpassword'], [$data['email']] 
if(empty($data['newpassword'])){
  $data['password_error'] = "New password is required";
 }
 if(empty($data['password'])){
    $data['email_error'] = "Old password is required";
 }
 //falla el sql statement Warning: PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens in C:\xampp\htdocs\Lab-Login\classes\source.php on line 24

  if(empty($data['password_error']) && password_verify ( $data['password'] ,$_SESSION["Contrasena"] )){
    $_SESSION["Contrasena"]= password_hash($data['newpassword'], PASSWORD_DEFAULT);
  if($source->Query("UPDATE usuario SET Contrasena = ? WHERE  id= ?" , [$_SESSION["Contrasena"],$_SESSION["id"]])){
    $data['password_cambiada'] = "Contraseña Cambiada!";
    $message = "Contraseña Cambiada con exito";
    header("location:profile.php");
   $_SESSION['password_success'] = "Hi ". $_SESSION["nombreUsuarioActivo"]. " Password changed correctly";


    
   
    

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
      <h3 class="heading">Modify Password</h3>
 </div>
 <div class="group">
      <input type="password" name="password" class="control" placeholder="Enter Old password..." value="<?php if(!empty($data['password'])): echo $data['password']; endif;?>">
      <div class="error">
        <?php if(!empty($data['email_error'])): ?>
          <?php echo $data['email_error']; ?>
        <?php endif; ?>
      </div>
     </div>
  <div class="group">
      <input type="password" name="newpassword" class="control" placeholder="New Password..." value="<?php if(!empty($data['newpassword'])): echo $data['newpassword']; endif;?>">
      <div class="error">
        <?php if(!empty($data['password_error'])): ?>
          <?php echo $data['password_error']; ?>
        <?php endif; ?>
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