<?php 
 session_start();
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/vistalogin.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <header>
            <div class="topnav" id="myTopnav">
  <a class="navbar-brand" href="../index.php">
    <img src="../img/logo_size.jpg" width="30" height="30" class="d-inline-block align-center" alt="">
    Mesa de Ayuda
  </a>
  <a href="../index.php" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="../integrantes.php">Integrantes</a>
  <a href="../quienessomos.php">Quienes Somos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

                   <?php
                                                    
                      /*   if(!empty($_SESSION)){
                                if ($_SESSION['ControlAdmin'] || $_SESSION['ControlJefeArea']) {
                echo' <a href="../gestion.php">Gestiones Mesa de Ayuda</a>';
                         }}
                   ?>
                        <?php
                        if (!empty($_SESSION)) {
                            echo'<a href="../control/ControlLogout.php">Cerrar Sesión</a>';
                        }
                       * 
                       */
                        ?> 
</div>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
var x = document.getElementById("myTopnav");
if (x.className === "topnav") {
  x.className += " responsive";
} else {
  x.className = "topnav";
}
}
</script>
        </header>
        <main>

            <div class="container-main">
                <h1>Inicio de Sesión</h1>

                <form action="../control/ControlLogin.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label><p>Email</p></label>
                            <input type="email" name="txtemailingreso" id="nombres" class='form-control'>
                        </div>
                        <div class="col-md-6">
                            <label><p>Identificación</p></label>
                            <input type="password" name="txtdocumentoingreso" id="nombres" class='form-control'>
                        </div>
                        
                    </div>
                    <div class="container-btn">
                            <center><input type="submit" class="btn" value="login" id="enviar"></center>
                        </div>
                </form>

            </div>
        </main>
        <footer>
<?php include "../footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>