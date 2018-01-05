<?php include 'filemenu.php' ?>
<div class="container">
  <div class="row" style="text-align:center;margin-top:3%">
    <div class="col-2">
    </div>
    <div class="col-8">
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

?>
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
foreach($filejpg as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
foreach($filepng as $allfiles){
    echo "<option value=".$allfiles.">".basename($allfiles)."</option>";
}
echo '</select><input type="submit" name="apagar" value="Apagar File" class="btn btn-primary w-100 mt-3"></form>';

if(isset($_POST["apagar"])){
$file=$_POST["files"];

//Delete File
  unlink($file);
  header('Refresh:0');

}
 ?>
</table>
</div>
</div>
</div>
