<!DOCTYPE>
<html>
<head>
</head>
<body>

<?php
$file=fopen("file.txt","a") or die("Erro a abrir o ficheiro!");
?>
<form method="post">
<input type="text" name="nome" placeholder="Inserir Nome">
<input type="submit" name="submit" value="Submit">
<input type="submit" name="open" value="Check File">
<input type="text" name="search" placeholder="Search Nome">
<input type="submit" name="searchs" value="Search">
<input type="submit" name="modificar" value="Modificar">
<input type="submit" name="criar" value="Menu de Files">
<input type="submit" name="clear" value="Clear">
</form>

<?php
if(isset($_POST["submit"])){
$nome=$_POST["nome"];
if(empty($nome)){
  echo 'Insira algo para colocar no ficheiro!';
}else{
fwrite($file, $nome."<br>");
echo "Inserido com sucesso!<br>";
fclose($file);

}
}

if(isset($_POST["open"])){
  echo "Conteudo do ficheiro:<br>" ;
  $read=file('file.txt');
  foreach($read as $name){
  echo $name."<br>";
}
}

if(isset($_POST["searchs"])){
  $search=$_POST["search"];
  $read='file.txt';
  if(empty($search)){
    echo 'Insira um nome para pesquisar!';
  }else{
  $content=file_get_contents($read);
  $lastsearch="/$search/";
  if(preg_match_all($lastsearch, $content, $result)){
    echo 'Encontrou!';
    echo implode($result[0]);
  }else{
    echo 'Nome não existente!';
  }
}
}

if(isset($_POST["modificar"])){
header("Location:editfile.php");
  }

if(isset($_POST["criar"])){
  header('Location: filemenu.php');
}

if(isset($_POST["clear"])){
  file_put_contents("file.txt","");
  echo 'File apagado!';
}

 ?>

</body>

</html>
