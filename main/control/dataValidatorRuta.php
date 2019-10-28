<?php 
class dataValidatorRuta {
  //Message errors    
   private $name_error = "A name is required";
   private $password_error_len = "That password was too short";
   private $Origen_error = "Beginning point is required";
   private $Destino_error = "End point is required";
   private $Direccion_error = "Adress is required";
   private $horaatencioninicioV_error = "Schedule is required1";
   private $horaatencionfinalV_error = "Schedule is required2";
   
  

 
  
   private $item_error_vacio = "Hey, please fill the required item";
 
 





   //Data validation
   public $numruta = false;
   public $descripcionV = false;
   public $pasajeV = false;
   public $duracionV = false;
   public $transporteespecialV = false;
   public $direccioniniV = false;
   public $direccionfinalV = false;
   public $horaatencioninicionV = false;
   public $horaatencionfinalV = false;
 
  

   function validData(){
    if($this->numruta && $this->descripcionV && $this->pasajeV  && $this->duracionV  && $this->transporteespecialV && $this->direccionini && $this->direccionfinal && $this->horaatencioninicionV && $this->horaatencionfinalV){
    
      return true;
    }
    
    return false;
   }
   }
    function validEmailLog(){
    if($this->emaiV){
    
      return true;
    }
    
    return false;


   }
  
   /*Funciones para validar el nombre*/
   function validarNombre($nombreruta){
   	if(empty($nombreruta)){
      $this->numruta = false;
      echo $this->name_error;        
    }
    else{
      $this->numruta = true;
    }
   }

   function validarDescripcion($Descripcion){
    if(empty($Descripcion)){
      $this->descripcionV = false;
      echo $this->item_error_vacio;
    }
    else{
      $this->descripcionV = true;
    }
   }

   function validarDuracion($Duracion){
    if(empty($Duracion)){
      $this->duracionV = false;
      echo $this->DestinoV_error;        
    }
    else{
      $this->duracionV = true;
    }
   }

   /*Funciones de usuario*/
   function validarPasaje($Pasaje){
    if(empty($Pasaje)){
      $this->pasajeV = false;
      echo $this->item_error_vacio;
    }
    else{
      $this->pasajeV = true;
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
  function validarTransporteEspecial($transporte){
    if(empty($transporte)){
      $this->transporteespecialV = false;
      echo $this->item_error_vacio;
    }
    else{
      $this->transporteespecialV = true;
    }
   }
  function validarDireccionIni($inicio){
    if(empty($inicio)){
      $this->direccioniniV = false;
      echo $this->Origen_error;
    }
    else{
      $this->direccioniniV = true;
    }
   }
  function validarDireccionFinal($final){
    if(empty($final)){
      $this->direccionfinalV = false;
      echo $this->Destino_error;
    }
    else{
      $this->direccionfinalV = true;
    }
   }
}