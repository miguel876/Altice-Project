<?php include 'filemenu.php'; ?>
<div class="container">
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
  $file_tmp="Files/".$file['tmp_name'];
  $file_size=$file['size'];
  $file_error=$file['error'];
  $file_location="../phpfiles/Altice-Project/Files/".$file_name;

  if(empty($file_name)){
    echo 'Insira algum ficheiro para inserir!';

  }else{

  //Tipo de ficheiro
  $file_ext=explode('.',$file_name);
  $file_ext=strtolower(end($file_ext));

  //Ficheiros permitidos
  $allowed=array('txt','xlsx','xls','xml','jpg','png');

  if(in_array($file_ext,$allowed)){
      if($file_error===1){
        echo 'Formato não suportado';
        }else{
                if(move_uploaded_file($file_tmp,$file_location)){
                  echo 'File inserido com sucesso!';
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
</div>
