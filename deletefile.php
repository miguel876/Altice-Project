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
//lista de files
$dir="../phpfiles/";
//raiz
$files=glob($dir."*.txt");
//nome do file
$filestxt=glob("*.txt");
$filexlsx=glob("*.xlsx");
$filexls=glob("*.xls");
$filexml=glob("*.xml");
$filejpg=glob("*.jpg");
$filepng=glob("*.png");

?>
<form method="post">
<select name="files" id="framework" class="form-control">
<?php
foreach($filestxt as $allfiles){
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
