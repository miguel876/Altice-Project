<?php
//Lista de files
$dirfile="Files/";

//Nome e Formato do Ficheiro
$filestxt=glob($dirfile."*.txt");
$filexlsx=glob($dirfile."*.xlsx");
$filexls=glob($dirfile."*.xls");
$filexml=glob($dirfile."*.xml");

function selectFiles($filestxt, $filexlsx, $filexls, $filexml){

foreach($filestxt as $allfiles){
  echo '<option value='.$allfiles.'>'.basename($allfiles).'</option>';
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

}
?>

  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">


<?php
echo '<form method="post"><select name="files" class="form-control">';
selectFiles($filestxt, $filexlsx, $filexls, $filexml);
echo '</select><input type="submit" name="open" value="Abrir File" class="btn btn-primary w-100 mt-3"></form>';

if(isset($_POST["open"])){

  $nam=$_POST["files"];
  header('Location:index.php?page=6&nam='.basename($nam));
}

 ?>
</div>
</div>
