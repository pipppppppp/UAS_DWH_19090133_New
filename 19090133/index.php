<?php
include'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="img/icon.png"/>

    <title>Sistem Pendukung Keputusan</title>
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>   
    <script src="assets/tinymce/tinymce.min.js"></script>           
  </head>
  <body style="background-color: #D0F6D7;">
    <nav class="navbar navbar-default navbar-static-top" style="background-color: #41B956;">
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?">Sistem Pendukung Keputusan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <?php if($_SESSION['login']):?>
            <li><a href="?m=cust"><span class="glyphicon glyphicon-list"></span> Tabel Customer</a></li>
            <li><a href="?m=employee"><span class="glyphicon glyphicon-list"></span> Tabel Employee</a></li>
            <li><a href="?m=product"><span class="glyphicon glyphicon-list"></span> Tabel Produk</a></li>
            <li><a href="?m=time"><span class="glyphicon glyphicon-time"></span>Tabel Waktu</a></li>
            <li><a href="?m=fakta"><span class="glyphicon glyphicon-list"></span> Tabel Fakta</a></li> 
            <li><a href="?m=predic"><span class="glyphicon glyphicon-stats"></span>Prediksi Forecasting</a></li>
            <?php endif?>               
          </ul>          
        </div>
      </div>
    </nav>
    <div class="container">
    <?php
        if(file_exists($mod.'.php'))
            if(!$_SESSION['login'] && in_array($mod, array('employee', 'product', 'time','fakta', 'password')))
                redirect_js('index.php?m=login');
            else
                include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <footer class="footer bg-primary" style="background-color: #41B956;">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?>Helina Putri<em class="pull-right"> January</em></p>
      </div>
    </footer>
</body>
</html>