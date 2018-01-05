
<?php
include 'filemenu.php';

//lista de files
$dir="Files/";
//raiz
$files=glob($dir."*.txt");
//Nome e Formato do Ficheiro
$filestxt=glob($dir,"*.txt");
$filexlsx=glob("*.xlsx");
$filexls=glob("*.xls");
$filexml=glob("*.xml");
$filejpg=glob("*.jpg");
$filepng=glob("*.png");

?>
<div class="container">
  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">
<form method="post">
<select name="files" id="framework" class="form-control">

<?php
//Mostar todos os files dentro da pasta
foreach($filestxt as $allfiles){
  str_replace("Files/"," ",$allfiles);
  echo "<option value=".$allfiles.">".$allfiles."</option>";

}
foreach($filexlsx as $allfiles){
    echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filexls as $allfiles){
    echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filexml as $allfiles){
    echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filejpg as $allfiles){
    echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filepng as $allfiles){
    echo "<option value=".$allfiles.">".$allfiles."</option>";
}
echo '</select></td><td><input type="submit" name="open" value="Abrir File" class="btn btn-primary w-100 mt-3"></form></td></tr>';


if(isset($_POST["open"])){
  $file=$_POST["files"];

  if(strpos($file,'.txt')!==false){
    //Ler ficheiro Text
      $read=file($file);
      foreach($read as $name){
      echo $name."<br>";
    }
  }else if(strpos($file,'.xlsx')!==false){
    //Ler ficheiro Excel

    include 'Classes/PHPExcel/IOFactory.php';

    $filename=$file;
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
    echo "</table>";

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
 </div>
