<html>
<head></head>
<body>
  <?php
$text='Resultaaa!!!!';
   ?>
   <form method="post">
<input type="submit" name="teste" value="Testar">
<textarea name="textoarea">
  <?php echo $text; ?>
</textarea>
</form>
<?php
if(isset($_POST["teste"])){
  $texto=$_POST["textoarea"];
  echo $texto;
}

 ?>
</body>
