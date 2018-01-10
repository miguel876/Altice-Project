<?php
class Encryption{
//Encriptar os parametros
  public function encryptURL($param){
      $parameter= $param;
      $encryptparam=password_hash($parameter, PASSWORD_DEFAULT);
      return $encryptparam;
  }

//Desencriptar os parametros
  function decryptURL($param, $hash){
    $parameter=$param;
    $hashstring=$hash;
    $confirm=0;

    if($parameter==="Success"){
    if(password_verify($parameter,$hash)){
      $confirm=0;
    }
  }else{
    if(password_verify($parameter,$hash)){
      $confirm=1;
    }
  }
    return $confirm;
  }

}




 ?>
