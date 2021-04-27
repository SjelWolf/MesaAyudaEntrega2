<!DOCTYPE html> 
<?php
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d H:i:s');
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/vistaRadicacion.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>radicación Requerimientos</title>
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
                   
                                                    
                         if(!empty($_SESSION)){
                                if ($_SESSION['ControlAdmin'] || $_SESSION['ControlJefeArea']) {
                echo' <a href="../gestion.php">Gestiones Mesa de Ayuda</a>';
                         }}
                   ?>
                        <?php
                        if (!empty($_SESSION)) {
                            echo'<a href="../control/ControlLogout.php">Cerrar Sesión</a>';
                        }
                        ?>
    <?php
   if(!empty($_SESSION)){
       
       echo '<p><a href="#">Bienvenido: '?><?php  if(empty(!$_SESSION)){echo''.$_SESSION['nombre'];} ?><?php echo'</a></p>';
       
   }
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
                <h1>Radicacion Requerimientos</h1>
                <form  action="../control/ControlRadicacion.php" method="post" name="form">

                    <div class="container-in">
                        <label class="label">Fecha Actual:</label>
                        <div class="input-content"> 
                            <input type="datetime-local" name="txtfecha" id="codigo" class="text-box" maxlength="20" value="<?php echo'' . $hoy; ?>">
                        </div>
                    </div>
                    <div class="container-in">
                        <label class="label">Vista Fecha Actual:</label>
                            <div class="input-content"> 
                                <input type="text" name="txtfecha2" id="codigo" class="text-box" maxlength="20" value="<?php echo'' . $hoy; ?>" disabled="true">
                            </div>
                    </div>

                    <div class="container">
                        <center><label class="label">detalles de su requerimiento</label></center>
                        <center><textarea id="form24" class="" rows="8" cols="40" maxlength="2000" name="txtobservacion"></textarea></center>
                    </div>

                        <div class="col-md-12">

                            <label class="label">Area a la cual desea remitir su requerimiento</label>
                            <select name="txtAreaRequerimiento" class="text-box">
                                <option value="30">Mantenimiento</option>
                                <option value="20">Gestión Humana</option>
                                <option value="10">Informática</option>
                            </select> 
                        </div>

                        <div class="container-btn">
                            <center>
                             <input type="submit" class="btn" value="Radicar Requerimiento" id="enviar">

                            </center>
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