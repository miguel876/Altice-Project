<?php
include 'filemenu.php';
?>
<div class="container">
  <div class="row" style="text-align:center;margin-top:3%;height:200px;">
    <div class="col-2">
    </div>
    <div class="col-8" style="height:200px;">
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


  echo '<input type="text" class="form-control mb-3" name="title" value='.$filemain.'>';

  //Conteudo
  ?>
<div style="overflow: auto; height:500px;">
  <?php
  if(strpos($file,'.txt')!==false){
  $read=file($file);
  ?>

    <textarea name="conteudo" rows='15' cols='50' class="form-control mt-3">
      <?php
  foreach($read as $name){
    $br=array("<br>");
    $name=str_replace($br,"\n",$name);
    echo $name;
  }
  ?>
</textarea>

  <?php
  }else if(strpos($file,'.xlsx')!==false || strpos($file,'.xls')!==false){
    //Ler ficheiro Excel

    include 'Classes/PHPExcel/IOFactory.php';

    $filename=$file;
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

?>
</div>
<input type="submit" name="editar" value="Editar File" class="btn btn-primary w-100 mt-3">
</form>

<script>
//Popup de erro
  function errorMessage(){
    alert('Caractéres não suportados!(< , > , ;)');

  }
</script>
<script>
//Popup de sucesso
function successMessage(){
  alert('Ficheiro editado com sucesso!');

}
</script>
<script>
//Popup de sucesso
function errorMessageForm(){
  alert('Formato de ficheiro não suportado!');

}
</script>
  <?php

if(isset($_POST["editar"])){

    if(strpos($file,'.txt')!==false){
    //Conteudo Txt
    $conteudo=$_POST["conteudo"];
    $error=0;
    //Verificar o Conteudo por caracteres invalidos
    if(strpos($conteudo,'<')!==false || strpos($conteudo,'>')!==false || strpos($conteudo,';')!==false){
        echo '<script>errorMessage()</script>';
        $error=1;

    }else{

    $main=fopen($file,'w');
    $br="\n";
    $cont=str_replace($br,"<br>",$conteudo);
    trim($cont," e");
    fwrite($main,$cont);
    fclose($main);
  }
}else if(strpos($file,'.xlsx')!==false || strpos($file,'xls')!==false){
    //Conteudo Excel

}
  //Titulo
    $newtitle=$_POST["title"];
    //Verificar se o ficheiro tem extensao
    if(strpos($newtitle,'.txt')!==true || strpos($newtitle,'.xlsx')!==true || strpos($newtitle,'.xls')!==true){
        echo '<script>errorMessageForm</script>';
    }

  if(strpos($newtitle,'<')!==false || strpos($newtitle,'>')!==false || strpos($newtitle,';')!==false){
          echo '<script>errorMessage()</script>';
    }else{
      $finaltitle=$dir.$newtitle;
      //Adicionar extensao denovo ao file
      if(strpos($filename,".txt")!==false){
          rename($file,$finaltitle.".txt");
      }else if(strpos($filename,".xlsx")!==false){
          rename($file,$finaltitle.".xlsx");
      }else if(strpos($filename,".xls")!==false){
          rename($file,$finaltitle.".xls");
      }else if(strpos($filename,".xml")!==false){
            rename($file,$finaltitle.".xml");
      }else{
        echo 'Erro ao carregar o file!';
      }



      //header('Location:saveeditfile.php?nam='.$newtitle);
      if($error!==1){
      echo '<script>successMessage()</script>';

    }

    }
}
?>
</div>
<div class="col-2">
</div>
</div>
</div>
