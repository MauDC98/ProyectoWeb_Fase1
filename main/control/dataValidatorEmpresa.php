<?php 
class dataValidatorEmpresa {
  //Message errors    
   private $name_error = "A name is required";
   private $email_error = "Your email is required";
   private $email_error_repeated = "Sorry email already exist";
   private $email_error_account = "Sorry your account has been disabled";
   private $password_error = "Password is required";
   private $password_error_len = "That password was too short";
   private $Origen_error = "Beginning point is required";
   private $Destino_error = "End point is required";
   private $Direccion_error = "Adress is required";
   private $horaatencioninicioV_error = "Schedule is required1";
   private $horaatencionfinalV_error = "Schedule is required2";
   
   private $telefono_error = "Phone number is required";
   private $telefono_error_len = "Hey, that phone number is too short";
   private $telefono_error_format = "Hey, that's not a valid phone number";
   private $telefonoEmer_error = "Phone number is required";
   private $telefonoEmer_error_len = "Hey, that phone number is too short";
   private $telefonoEmer_error_format = "Hey, that's not a valid phone number";




   //Data validation
   public $nameV = false;
   public $OrigenV = false;
   public $DestinoV = false;
   public $DireccionV = false;
   public $horaatencioninicioV = false;
   public $horaatencionfinalV = false;
   public $numreporteV = false;
   public $teleV = false;
   public $emaiV = false;
  

   function validData(){
    if($this->nameV && $this->OrigenV && $this->DestinoV && $this->DireccionV && $this->horaatencioninicioV &&  $this->horaatencionfinalV && $this->numreporteV  && $this->teleV && $this->emaiV){
    
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

   function validarOrigen($origen){
    if(empty($origen)){
      $this->OrigenV = false;
      echo $this->Apellido1_error;
    }
    else{
      $this->OrigenV = true;
    }
   }

   function validarDestino($destino){
    if(empty($destino)){
      $this->DestinoV = false;
      echo $this->DestinoV_error;        
    }
    else{
      $this->DestinoV = true;
    }
   }

   /*Funciones de usuario*/
   function validarDireccion($direccion){
    if(empty($direccion)){
      $this->DireccionV = false;
      echo $this->nickname_error;
    }
    else{
      $this->DireccionV = true;
    }
   }
  function validarAtencioninicio($atencion){
    if(empty($atencion)){
      $this->horaatencioninicioV = false;
      echo $this->horaatencioninicioV_error;
    }
    else{
      $this->horaatencioninicioV = true;
    }
   }
  function validarAtencionfinal($atencion){
    if(empty($atencion)){
      $this->horaatencionfinalV = false;
      echo $this->horaatencionfinalV_error;
    }
    else{
      $this->horaatencionfinalV = true;
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
  function validarTelefonoEmergencia($telefonoEmer){
    $num = $telefonoEmer;
    if(empty($telefonoEmer)){
      $this->numreporteV = false;
      echo $this->telefonoEmer_error;
    }    
    else if(!is_numeric($num)){
      $this->numreporteV = false;
      echo $this->telefonoEmer_error_format;
    }
    else if(strlen($telefonoEmer) < 8){
      $this->numreporteV = false;
      echo $this->telefonoEmer_error_len;
    }
    else{
      $this->numreporteV = true;
    }
   }





   

}