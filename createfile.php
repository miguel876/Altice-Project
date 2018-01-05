<?php include 'filemenu.php' ?>
<div class="container">
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
<script>
function successCreate(){
  alert('File criado com sucesso!');
}

function errorCreate(){
  alert('Nome do ficheiro já existe!');
}

function errorCreate2(){
  alert('Não pode deixar o nome do ficheiro vazio!');
}
</script>
<?php

if(isset($_POST["createfile"])){
    $filename=$_POST["filetit"];
    $checkname=0;
  //nome do file
  $filestxt=glob("*.txt");
  $filexlsx=glob("*.xlsx");
  $filexls=glob("*.xls");
  $filexml=glob("*.xml");
  $checkname=0;
  foreach($filestxt as $allfiles){
  if($filename.".txt"===$allfiles){
    $checkname=1;

  }
  }

  if(empty($filename)){
    echo '<script>errorCreate2()</script>';
  }else if($checkname==1){
    //Verificar se já existe um ficheiro com o mesmo Nome
    echo '<script>errorCreate()</script>';
  }else{
    fopen($filename.'.txt','w');
    echo '<script>successCreate()</script>';
  }
}
  ?>
</div>
</div>
</div>
