<?php 
class dataValidator {
  //Message errors    
   private $name_error = "Name is required";
   private $email_error = "Your email is required";
   private $email_error_repeated = "Sorry email already exist";
   private $email_error_account = "Sorry your account has been disabled";
   private $password_error = "Password is required";
   private $password_error_len = "That password was too short";
   private $Apellido1_error = "First last name is required";
   private $Apellido2_error = "Second last name is required";
   private $nickname_error  = "User is required";
   private $telefono_error = "Phone number is required";
   private $telefono_error_len = "Hey, that phone number is too short";
   private $telefono_error_format = "Hey, that's not a valid phone number";
   private $confirm_error = "Please confirm your password";
   private $confirm_error_nomatch = "Password did not match";
   private $contraseñalog_error = "Password is required";


   //Data validation
   public $nameV = false;
   public $ape1V = false;
   public $ape2V = false;
   public $nickV = false;
   public $passV = false;
   public $cn_pV = false;
   public $teleV = false;
   public $emaiV = false;
   public $activo = false;

   function validData(){
    if($this->nameV && $this->ape1V && $this->ape2V && $this->nickV && $this->passV && $this->cn_pV && $this->teleV && $this->emaiV){
    
      return true;
    }
    
    return false;
   }
   function validAccount(){
    if($this->activo){
    
      return true;
    }
    
    return false;


   }
    function validEmailLog(){
    if($this->emaiV){
    
      return true;
    }
    
    return false;


   }
    function validarPasswordLog(){
    if($this->passV){
    
      return true;
    }
    
    return false;


   }
   

   /*Funciones para validar el nombre*/
   function validarNombre($nombre){
   	if(empty($nombre)){
      $this->nameV = false;
      echo $this->name_error;        
    }
    else{
      $this->nameV = true;
    }
   }

   function validarApellido1($apellido1){
    if(empty($apellido1)){
      $this->ape1V = false;
      echo $this->Apellido1_error;
    }
    else{
      $this->ape1V = true;
    }
   }

   function validarApellido2($apellido2){
    if(empty($apellido2)){
      $this->ape2V = false;
      echo $this->Apellido2_error;        
    }
    else{
      $this->ape2V = true;
    }
   }

   /*Funciones de usuario*/
   function validarNickname($nickname){
    if(empty($nickname)){
      $this->nickV = false;
      echo $this->nickname_error;
    }
    else{
      $this->nickV = true;
    }
   }
  function validarEmailVacio($emaiV){
    if(empty($emaiV)){
      $this->emaiV = false;
      echo $this->email_error;
    }
    else{
      $this->emaiV = true;
    }
   }
  function validarContrasenaVacio($passV){
    if(empty($passV)){
      $this->passV = false;
      echo $this->password_error;
    }
    else{
      $this->passV = true;
    }
   }
   /*Funciones de contrasena*/
   function validarPassword($password){
    if(empty($password)){
      $this->passV = false;
      echo $this->password_error;
    }
    else if(strlen($password) < 5){
      $this->passV = false;
      echo $this->password_error_len;
    }
    else{
      $this->passV = true;
    }
   }

   function validarConfirmPassword($cm_password,$password){
    if(empty($cm_password)){
      $this->cn_pV = false;
      echo $this->confirm_error;
    }
    else if($cm_password != $password){
      $this->cn_pV = false;
      echo $this->confirm_error_nomatch;    
    }
    else{
      $this->cn_pV = true;
    }
   }

   /*Validar email y correo*/
   function validarEmail($email,$source){
    if(empty($email)){
      $this->emaiV = false;
      echo $this->email_error;      
    }
    else{
      if($source->Query("SELECT * FROM usuario WHERE email = ?", [$email])){
        if($source->CountRows()>0){        
          $this->emaiV = false;
          echo $this->email_error_repeated;        
        }
        else{
          $this->emaiV = true;
      }}
    }
   }
  function validarContraseñaLog($email,$source){
   
      if($source->Query("SELECT * FROM usuario WHERE email = ?", [$email])){
        if($source->CountRows()>0){
          $prueba = $source->Query("SELECT Contrasena FROM usuario WHERE email = ?", [$email]);
          echo "$prueba";
          if (password_verify($prueba,$contrasena)){//aqui modifique esto
          $this->passV = true;
                 
          }
        else{
          $this->passV = false;
          
          

      }}
    }
    else{
      $this->passV = false;
      echo $this->confirm_error_nomatch;
    }
   }
 
  function validarCuenta($email,$source){
    
      if($source->Query("SELECT * FROM usuario WHERE email = ? and activo = 0", [$email])){
        if($source->CountRows()>0){        
          $this->activo = false;
          echo $this->email_error_account;        
        }
        else{
          $this->activo = true;
          
      }
      }
      else
      {
        $this->activo = true;
        echo $this->email_error_account;
      }
    }
   

   function validarTelefono($telefono){
    $num = $telefono;
    if(empty($telefono)){
      $this->teleV = false;
      echo $this->telefono_error;
    }    
    else if(!is_numeric($num)){
      $this->teleV = false;
      echo $this->telefono_error_format;
    }
    else if(strlen($telefono) < 8){
      $this->teleV = false;
      echo $this->telefono_error_len;
    }
    else{
      $this->teleV = true;
    }
   }





   

}