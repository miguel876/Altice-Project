<!DOCTYPE html>
<html>
<head>
  <head><title>Altice</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src="JavaScript/alert.js"></script>
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

<body>
  <div class="container-fluid">
    <div class="row" style="z-index: 1;">
      <div class="col" style="z-index: 1;">
    <header>

      <nav class="navbar navbar-expand-lg bg-dark" style="box-shadow: 0px 2px 2px #0F102B;" >
        <a href="index.php"><img src="SystemImages/altice.png" widht="27px" height="27px" style="margin-top:5px;"></a>
        <div class="text-logo">Altice</div>
          <div class="vertical-line"></div>
          <div class="img_top" style="text-align:right;width:87%;"><a href="https://github.com/miguel876/Altice-Project" ><img src="SystemImages/github.png" height="30px" width="30px"></a></div>

      </nav>

    <div class="hidden" id="alert">
          <div class="alert alert-warning alert-dismissible fade show" id="alertDiv" style="margin-top:1%;height:50px;background-color:#FF5450;color:white;position:absolute;opacity:0.8;" role="alert">
        <p id="alertText"></p>
        <button type="button" class="close mb-1" data-dismiss="alert" style="padding-bottom:1%;" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        </div>

</div>

</div>
</header>
<div class="row" style="height:600px;">
<?php
include 'header.php';
?>
<div class="col mt-3">
  <?php
  include 'main.php';
  ?>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>

</html>
