
<?php
include 'filemenu.php';

//Lista de files
$dirfile="Files/";

//Nome e Formato do Ficheiro
$filestxt=glob($dirfile."*.txt");
$filexlsx=glob($dirfile."*.xlsx");
$filexls=glob($dirfile."*.xls");
$filexml=glob($dirfile."*.xml");

?>
<div class="container">
  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">
<form method="post">

<select name="files" id="framework" class="form-control">
<?php
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
echo '</select></td><td><input type="submit" name="open" value="Abrir File" class="btn btn-primary w-100 mt-3"></form></td></tr>';

if(isset($_POST["open"])){
  $nam=$_POST["files"];
  header('Location:saveeditfile.php?nam='.basename($nam));
}

 ?>
</div>
</div>
</div>
