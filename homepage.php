<?php
//lista de files
$dir="../phpfiles/";
//raiz
$files=glob($dir."*.txt");
//Nome e Formato do Ficheiro
$filestxt=glob("*.txt");
$filexlsx=glob("*.xlsx");
$filexls=glob("*.xls");
$filexml=glob("*.xml");
$filejpg=glob("*.jpg");
$filepng=glob("*.png");

?>
  <div class="row" style="text-align:center;margin-top:3%">

    <div class="col">
      <div class="row">
      <div class="col-3">
<form method="post">
<input type="text" name="search" placeholder="Search" class="form-control">
<input type="submit" name="searchbtn" value="Search" class="btn btn-primary w-100 mt-3">

</form>
</div>

</div>

<div class="row">

  <?php
  //Mostar todos os files dentro da pasta
  foreach($filestxt as $allfiles){

    echo "  <div class='col-sm-3 mt-3'>
        <div class='card'>
          <div class='card-body'>
            <h5 class='card-title'>".$allfiles."</h5>
            <form method='post'>


            </form>
          </div>
        </div>
      </div>";
  }
   ?>

</div>

<?php
$file="router1.txt";
if(isset($_POST["open"])){
  header('Location:openfile.php?file='.$file);
}

if(isset($_POST["searchbtn"])){
  $search=$_POST["search"];

}
 ?>
</div>
</div>
