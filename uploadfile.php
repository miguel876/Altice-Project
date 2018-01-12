<?php

 ?>
 <div class="row  mt-3">
<div class="col-3">
</div>
<div class="col">
<form method="post" enctype="multipart/form-data">
<input type="file" name="file" class="form-control-file">
<input type="submit" value="Upload" name="upload" class="btn btn-primary w-50 mt-2">
</form>
</div>
</div>
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
  $file_name=str_replace(" ","",$file_name);

$checkname=0;
foreach($filestxt as $allfiles){
if($file_name==basename($allfiles)){
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
    echo '<script>
    var text="Insira algum ficheiro para inserir!";
    var type= 0;
    setAlert(text,1);
    </script>';
  }
    else if($checkname===1){
      echo '<script>
      var text="O ficheiro já existe!";
      var type= 0;
      setAlert(text,1);
      </script>';

  }else{
  //Tipo de ficheiro
  $file_ext=explode('.',$file_name);
  $file_ext=strtolower(end($file_ext));

  //Ficheiros permitidos
  $allowed=array('txt','xlsx','xls','xml','jpg','png');

  if(in_array($file_ext,$allowed)){
      if($file_error===1){
        echo '<script>
        var text="Erro ao fazer upload do ficheiro";
        var type= 0;
        setAlert(text,1);
        </script>';
        }else{

                if(move_uploaded_file($file_tmp,"$file_location/$file_name")){

                  echo '<script>
                  var text="File inserido com sucesso!";
                  var type= 0;
                  setAlert(text,0);
                  </script>';
              }
            }
          }else{
    echo '<script>
    var text="Formato do ficheiro não suportado!";
    var type= 0;
    setAlert(text,1);
    </script>';
  }
}
}
 ?>
