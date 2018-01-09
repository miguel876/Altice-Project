<?php
function createFile($file){
  $filename=$file;
  $checkname=0;
  //Lista de files
  $dirfile="Files/";

  //Nome e Formato do Ficheiro
  $filestxt=glob($dirfile."*.txt");
  $filexlsx=glob($dirfile."*.xlsx");
  $filexls=glob($dirfile."*.xls");
  $filexml=glob($dirfile."*.xml");

$checkname=0;
//Verificar se já existe um ficheiro com o mesmo nome
foreach($filestxt as $allfiles){
if($filename.".txt"===basename($allfiles)){
  $checkname=1;

}
}
foreach($filexlsx as $allfiles){
if($filename.".xlsx"===basename($allfiles)){
  $checkname=1;

}
}
foreach($filexls as $allfiles){
if($filename.".xls"===basename($allfiles)){
  $checkname=1;

}
}
foreach($filexml as $allfiles){
if($filename.".xml"===basename($allfiles)){
  $checkname=1;

}
}

if(empty($filename)){
  echo '<script>
  var text="Não pode deixar o nome do ficheiro vazio!";
  var type= 0;
  setAlert(text,1);
  </script>';

}else if($checkname==1){
  //Verificar se já existe um ficheiro com o mesmo nome
  echo '<script>
  var text="Já existe um ficheiro com o mesmo nome!";
  setAlert(text,1);
  </script>';
}else{
  fopen('Files/'.$filename.'.txt','w');

echo '<script>
  var text="File criado com sucesso!";
  setAlert(text,0);
  </script>';

}
}
?>

<div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">

<form method="post">
  <div class="form-group">
    <input type="text" name="filetit" placeholder="Nome do File" class="form-control">
  </div>
<input type="submit" name="createfile" value="Criar File" class="btn btn-primary w-100">
</form>

<?php
if(isset($_POST["createfile"])){
  $filename=$_POST["filetit"];
    createFile($filename);
}
  ?>
</div>
</div>
