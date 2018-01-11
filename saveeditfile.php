<?php
function readExcel($filename){
  //Ler ficheiro Excel

  include 'Classes/PHPExcel/IOFactory.php';

  //Criar uma variavel para ler o ficheiro Excel
  $excelReader=PHPExcel_IOFactory::createReaderForFile($filename);
  //Criar uma variavel que vai conter o ficheiro, o objeto do ficheiro Excel
  $excelObj=$excelReader->load($filename);
  //Obter a folha Excel
  $sheet=$excelObj->getActiveSheet();
  //Obter a ultima Row do ficheiro Excel
  $lastRow=100;
  //Obter a ultima Coluna do ficheiro Excel
  $lastCol=$sheet->getHighestColumn();

  echo "<table class='table table-bordered' style='text-align:center;'>";
  echo "<tr><td></td>";
  for($cc='A';$cc<=$lastCol;$cc++){
    echo "<td>".$cc."</td>";
  }
  echo "</tr>";
  for($r=1;$r<=$lastRow;$r++){
    echo "<tr><td>".$r."</td>";
    for($c='A'; $c<=$lastCol;$c++){

      echo "<td><input type='text' name='conteudo' value='".$sheet->getCell($c.$r)->getValue()."'></td>";

    }
    echo "<tr>";
  }
  echo "</table>";
}

//Alerts
$alerthash=@$_GET["edit"];

$edit="Success";

include 'Classes/Encryption.php';
$encrypt= new Encryption;
$confirmencrypt=$encrypt->decryptURL($edit,$alerthash);
if(!empty($alerthash)){
if($confirmencrypt===0){
  echo '<script>
    var text="File editado com sucesso!";
    setAlert(text,0);
    </script>';

}else if($confirmencrypt===1){
  echo '<script>
  var text="Erro ao editar o ficheiro!";
  setAlert(text,1);
  </script>';
}
}
 ?>

<form method="post">

<?php
  $dir="Files/";
  $file=$dir.$_GET["nam"];

  //Titulo
  //Comprimir o titulo
  $filename=basename($file);

    if(strpos($filename,".txt")!==false){
      $filemain=str_replace(".txt","",$filename);
    }else if(strpos($filename,".xlsx")!==false){
        $filemain=str_replace(".xlsx","",$filename);
    }else if(strpos($filename,".xls")!==false){
        $filemain=str_replace(".xls","",$filename);
    }else if(strpos($filename,".xml")!==false){
        $filemain=str_replace(".xml","",$filename);
    }else{
      echo 'Erro ao carregar o file!';
    }


  echo '<input type="text" class="form-control mb-3" name="title" value='.@$filemain.'>';

  //Conteudo
  ?>
<div style="overflow: auto; height:500px;margin-bottom:3px;">
  <?php
  if(strpos($file,'.txt')!==false){
  $read=file($file);
  ?>

    <textarea name="conteudo" rows='15' cols='50' class="form-control">
      <?php
  foreach($read as $name){
    $name=str_replace("<br>","\n",$name);
    echo $name;
  }
  ?>
</textarea>

  <?php
  }else if(strpos($file,'.xlsx')!==false || strpos($file,'.xls')!==false){
      $filename=$file;
      readExcel($filename);

  }

?>
</div>
<input type="submit" name="editar" value="Editar File" class="btn btn-primary w-100 mb-3">
</form>

  <?php

if(isset($_POST["editar"])){

    if(strpos($file,'.txt')!==false){

    //Conteudo Txt
    $conteudo=$_POST["conteudo"];
      //Titulo
    $newtitle=$_POST["title"];

    //Verificar o Conteudo por caracteres invalidos
    if(strpos($conteudo,'<')!==false || strpos($conteudo,'>')!==false || strpos($conteudo,';')!==false){
      echo '<script>
      var text="O conteúdo contém caracteres inválidos!";
      setAlert(text,1);
      </script>';
      $continuar=1;
    }else{

    $main=fopen($file,'w');
    $br="\n";
    $cont=str_replace($br,"<br>",$conteudo);
    trim($cont," ");
    fwrite($main,$cont);
    fclose($main);
  }
    if(@$continuar!==1){
  if(strpos($newtitle,'<')!==false || strpos($newtitle,'>')!==false || strpos($newtitle,';')!==false || strpos($newtitle," ")!==false){
    echo '<script>
    var text="O título contém caracteres inválidos! (< > ; SPACE)";
    setAlert(text,1);
    </script>';
  }else{
    $finaltitle=$dir.$newtitle;

    //Adicionar extensao de novo ao file
    if(strpos($filename,".txt")!==false){
        rename($file,$finaltitle.".txt");

        $edit="Success";
        $encrypt= new Encryption;
        $encrypted=$encrypt->encryptURL($edit);
        header('Location:index.php?page=6&nam='.$newtitle.'.txt&edit='.$encrypted.'');

    }else{

      header('Location:index.php?page=6&nam='.$newtitle.'.txt');

    }
  }
  }

}else if(strpos($file,'.xlsx')!==false || strpos($file,'xls')!==false){
    //Conteudo Excel

  }else if(strpos($file,'.xml')!==false){
      //Conteudo XML

    }
  else{
    echo '<script>
    var text="O formato do ficheiro não é suportado (txt, xlsx, xls, xml)!";
    setAlert(text,1);
    </script>';
  }


}

?>
