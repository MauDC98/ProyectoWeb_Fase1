<?php include "init.php"; ?>

<?php if(!isset($_SESSION['id'])): ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Profile</title>
     <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
     <link rel="stylesheet" href="assets/css/style.css"> 
     <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
 </head>
 <body>
    <div class="contain-padre">
        <div class="contain">
         <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
                <?php echo $_SESSION['login_success']; ?>
            </div>

         <?php endif; ?>

         <?php unset($_SESSION['login_success']); ?>
         <?php if(isset($_SESSION['password_success'])): ?>
            <div class="success">
                <?php echo $_SESSION['password_success']; ?>
            </div>

         <?php endif; ?>
          <?php unset($_SESSION['password_success']); ?>

         <h2>This is your profile</h2><hr>
        <div class="btn-modify">
        <a class="btn" href="modify.php">Modify</a>
        <br>
        <a class="btn" href="logout.php">Logout</a>
        <br>
        <a class="btn" href="inhabilitar.php">Inhabilitar cuenta</a>
        </div>
       
     </div>
    </div>
     
 </body>
 </html>