<?php
//Lista de files
$dirfile="Files/";
$dirimg="Images/";

$file="";

//Nome e Formato do Ficheiro
$filestxt=glob($dirfile."*.txt");
$filexlsx=glob($dirfile."*.xlsx");
$filexls=glob($dirfile."*.xls");
$filexml=glob($dirfile."*.xml");
$filejpg=glob($dirimg."*.jpg");
$filepng=glob($dirimg."*.png");

  //Delete File
function deleteFile($filename){
  $file=$filename;
  unlink($file);

  header('Location:index.php?page=2');

}

function selectFiles($filestxt, $filexlsx, $filexls, $filexml){
echo '<form method="post"><select name="files" id="framework" class="form-control">';
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
?>

  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">
      <div id="hidden1" style="display:block;">

<?php
$file=@$_POST["files"];
selectFiles($filestxt, $filexlsx, $filexls, $filexml);
echo '</select><form method="post"><input type="submit" name="apagar" value="Apagar File" class="btn btn-primary w-100 mt-3">';

 ?>

</div>

<div id="hidden2" style="display:none;">
  <div class="card bg-light mb-3">
<div class="card-header">Apagar Ficheiro</div>
<div class="card-body">
  <h5 class="card-title">Apagar o ficheiro <?php echo basename($file) ?>?</h5>

  <input type="submit" name="delete" value="Apagar" class="btn btn-primary">
  <input type="submit" name="cancelar" value="Cancelar" class="btn btn-secondary">
</form>
</div>
</div>
</div>

<?php
$is=isset($_POST["apagar"]);
if($is){
  echo '<script>
      setDeleteWindow()
  </script>';
  unset($is);
}

if(isset($_POST["delete"])){
deleteFile($file);

}

 ?>
</div>
</div>
