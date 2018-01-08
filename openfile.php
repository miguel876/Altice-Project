<?php
function selectedFiles($filestxt, $filexlsx, $filexml, $filejpg, $filepng){
//Mostar todos os files dentro da pasta
foreach($filestxt as $allfiles){
  echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filexlsx as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filexls as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filexml as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filejpg as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filepng as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
}

function readExcel($filename){
  include 'Classes/PHPExcel/IOFactory.php';
  //Criar uma variavel para ler o ficheiro Excel
  $excelReader=PHPExcel_IOFactory::createReaderForFile($filename);
  //Criar uma variavel que vai conter o ficheiro, o objeto do ficheiro Excel
  $excelObj=$excelReader->load($filename);
  //Obter o Excel
  $sheet=$excelObj->getActiveSheet();
  //Obter a ultima Row do ficheiro Excel
  $lastRow=$sheet->getHighestRow();
  //Obter a ultima Coluna do ficheiro Excel
  $lastCol=$sheet->getHighestColumn();
  echo '<div style="overflow: auto; height:500px">';
  echo "<table class='table table-bordered' style='text-align:center;'>";
  echo "<tr><td></td>";
  for($cc='A';$cc<=$lastCol;$cc++){
    echo "<td>".$cc."</td>";
  }
  echo "</tr>";
  for($r=1;$r<=$lastRow;$r++){
    echo "<tr><td>".$r."</td>";
    for($c='A'; $c<=$lastCol;$c++){

      echo "<td>".$sheet->getCell($c.$r)->getValue()."</td>";

    }
    echo "<tr>";
  }
  echo "</table></div>";
}

function readText($read){
  foreach($read as $name){
  echo $name."<br>";
}
}

//Lista de files
$dirfile="Files/";
$dirimg="Images/";

//Nome e Formato do Ficheiro
$filestxt=glob($dirfile."*.txt");
$filexlsx=glob($dirfile."*.xlsx");
$filexls=glob($dirfile."*.xls");
$filexml=glob($dirfile."*.xml");
$filejpg=glob($dirimg."*.jpg");
$filepng=glob($dirimg."*.png");

?>
  <div class="row" style="margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">
<form method="post">
<select name="files" id="framework" class="form-control">

<?php

selectedFiles($filestxt, $filexlsx, $filexml, $filejpg, $filepng);
echo '</select></td><td><input type="submit" name="open" value="Abrir File" class="btn btn-primary w-100 mt-3"></form></td></tr>';


if(isset($_POST["open"])){

  $file=$_POST["files"];

  if(strpos($file,'.txt')!==false){
    //Ler ficheiro Text
    $read=file($file);
    readText($read);

  }else if(strpos($file,'.xlsx')!==false){
    //Ler ficheiro Excel
    $filename=$file;
    readExcel($filename);

  }else if(strpos($file,'.xls')!==false){
    //Ler ficheiro Excel
    echo 'Ficheiro Excel';

  }else if(strpos($file,'.xml')!==false){
    //Ler ficheiro XML
    echo 'Ficheiro XML';

  }
//Ler Imagens
//Imagem tipo PNG
  else if(strpos($file,'.png')!==false){
    echo "<img src=".$file.">";

  }
//Imagem tipo JPG
  else if(strpos($file,'.jpg')!==false){
      echo "<img src=".$file.">";
  }
  else{
    echo 'Erro ao ler ficheiro!';
  }



}
 ?>
</div>
</div>
