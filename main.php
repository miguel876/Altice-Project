<main>
<?php
if(@$_REQUEST["page"]){
@$id=$_REQUEST["page"];
//Validação contra injections
if($id>0){
switch($id){

  case '1':
   include 'createfile.php';
   break;

  case '2':
    include 'deletefile.php';
    break;

  case '3':
    include 'openfile.php';
    break;

  case '4':
    include 'editfile.php';
    break;

  case '5':
    include 'uploadfile.php';
    break;

    case '6':
      include 'saveeditfile.php';
      break;

   default:
      include 'openfile.php';
   break;
}

}else{
    echo 'Nao tem autorização para aceder a esta página!';
}

}else{
  header('Location:index.php?page=1');
}


?>
</main>
