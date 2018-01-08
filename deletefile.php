<?php
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

  //Delete File
function deleteFile($filename){

    $file=$filename;
    unlink($file);
    header('Refresh:0');
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

<script>
function deleteFile(){
  var confirmar=0;
  var conf=confirm('Apagar o file?');
  if(conf==1){
    confirmar=1;
    window.location.href="filemenu.php?conf="+confirmar;
  }

}
</script>


  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">

<?php

selectFiles($filestxt, $filexlsx, $filexls, $filexml);
echo '<form method="post"></select><input type="submit" name="apagar" value="Apagar File" class="btn btn-primary w-100 mt-3"></form>';

if(isset($_POST["apagar"])){
$file=$_POST["files"];
deleteFile($file);

}
 ?>
</table>
</div>
</div>
