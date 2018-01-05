
<?php
include 'filemenu.php';

//lista de files
$dir="../phpfiles/";
//raiz
$files=glob($dir."*.txt");
//nome do file
$filestxt=glob("*.txt");
$filesxlsx=glob("*.xlsx");
$filesxls=glob("*.xls");
$filesxml=glob("*.xml");

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
  echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filesxlsx as $allfiles){
  echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filesxls as $allfiles){
  echo "<option value=".$allfiles.">".$allfiles."</option>";
}
foreach($filesxml as $allfiles){
  echo "<option value=".$allfiles.">".$allfiles."</option>";
}
echo '</select></td><td><input type="submit" name="open" value="Abrir File" class="btn btn-primary w-100 mt-3"></form></td></tr>';

if(isset($_POST["open"])){
  $nam=$_POST["files"];
  header('Location:saveeditfile.php?nam='.$nam);
}

 ?>
</div>
</div>
</div>
