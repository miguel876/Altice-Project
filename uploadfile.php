<?php

 ?>

<div class="row" style="text-align:center;margin-top:3%">
    <div class="col-3">
    </div>
    <div class="col-6">
<form method="post" enctype="multipart/form-data">
<input type="file" name="file" >
<input type="submit" value="Upload" name="upload" class="btn btn-primary w-50 mt-2">
</form>

<?php
if(isset($_POST['upload'])){
  $file=$_FILES['file'];
  $file_name=$file['name'];
  $file_tmp=$file['tmp_name'];
  $file_size=$file['size'];
  $file_error=$file['error'];
  $file_location="C:/xampp/htdocs/phpfiles/Altice-Project/Files";

  //Lista de files
  $dirfile="Files/";

  //Nome e Formato do Ficheiro
  $filestxt=glob($dirfile."*.txt");
  $filexlsx=glob($dirfile."*.xlsx");
  $filexls=glob($dirfile."*.xls");
  $filexml=glob($dirfile."*.xml");

$checkname=0;
foreach($filestxt as $allfiles){
if($file_name===basename($allfiles)){
  $checkname=1;
}
}
foreach($filexlsx as $allfiles){
if($file_name===basename($allfiles)){
  $checkname=1;
}
}
foreach($filexls as $allfiles){
if($file_name===basename($allfiles)){
  $checkname=1;
}
}
foreach($filexml as $allfiles){
if($file_name===basename($allfiles)){
  $checkname=1;
}
}

  if(empty($file_name)){
    echo 'Insira algum ficheiro para inserir!';
  }
    else if($checkname===1){
      echo "O ficheiro já existe!";

  }else{

  //Tipo de ficheiro
  $file_ext=explode('.',$file_name);
  $file_ext=strtolower(end($file_ext));

  //Ficheiros permitidos
  $allowed=array('txt','xlsx','xls','xml','jpg','png');

  if(in_array($file_ext,$allowed)){
      if($file_error===1){
        echo 'Erro ao fazer upload do ficheiro';
        }else{
                $file_name=str_replace(" ","",$file_name);
                if(move_uploaded_file($file_tmp,"$file_location/$file_name")){

                  $success="File inserido com sucesso!";
                  echo $file_name;
              }
            }
          }else{
    echo 'Formato do ficheiro não suportado!';
  }
}
}
 ?>
</div>
</div>
