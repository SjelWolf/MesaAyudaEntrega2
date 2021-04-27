<?php
session_start();
include '../control/ControlConexion.php';
include '../control/ControlConsultas.php';
include '../modelo/Consultas.php';
include '../modelo/Empleados.php';
include '../control/ControlEmpleados.php';
$Consulta = new Consultas('', '', '', '');
$objControlConsulta = new ControlConsultas($Consulta);
$MatrizConsulta1= $objControlConsulta->consulta1();
$MatrizConsulta2= $objControlConsulta->consulta2();
/*$mt= $objControlConsulta->consulta3();
$mt= $objControlConsulta->consulta4();
$mt= $objControlConsulta->consulta5();*/
$MatrizConsulta6= $objControlConsulta->consulta6();
//print_r($MatrizConsulta1);
//print_r($MatrizConsulta2);
//print_r($MatrizConsulta6);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo'Aquí va el modulo de consultas de informes';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/vistaCargos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta e Informes</title>
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
       
       echo '<p><a style=" font-size: 25px;color:white;font-family:Comic Sans MS"  href="#">Bienvenido: '?><?php  if(empty(!$_SESSION)){echo''.$_SESSION['nombre'];} ?><?php echo'</a></p>';
       
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
                <div>
     <center> <h1 style=" font-size: 20px;color: turquoise;font-family:Comic Sans MS" >Nombre áreas, Nombre Encargado de Area y NUmero de Empleados</h1></center>
            <table border="1" class="table table-bordered table-striped">
                <tr border="1">
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Nombre Área</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Encargado</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Número de Empleados</td>
                </tr>
                <?php
                     foreach ($MatrizConsulta1 as $mt){
                $objEmpleados31 = new Empleados($mt->getRegistro2(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados31 = new ControlEmpleados($objEmpleados31);
                $objControlEmpleados31->consultar();
                $NombreEmpleado = $objEmpleados31->getNombre();
                $objEmpleados32 = new Empleados($mt->getRegistro2(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados32 = new ControlEmpleados($objEmpleados32);
                $objControlEmpleados32->consultar();
                $NombreAsignado = $objEmpleados32->getNombre();
                  if (empty($NombreAsignado)) {
                    $NombreAsignado2 = 'Sin Asginar';
                } else {
                    $NombreAsignado2 = $NombreAsignado;
                }
                                        
                echo '<tr>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $mt->getRegistro1() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreAsignado2 . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $mt->getRegistro3(). '</td>';
                echo '</tr>';
              }
                ?>

            </table>
             
               </div>
               <div>
                    <center> <h1 style=" font-size: 20px;color: turquoise;font-family:Comic Sans MS" >Nombre Empleados, Nombre líder y área de pertenencia</h1></center>
            <table border="1" class="table table-bordered table-striped">
                <tr border="1">
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Nombre Empleado</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Nombre Líder</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Nombre área</td>
                </tr>
                <?php
                     foreach ($MatrizConsulta2 as $mt2){
                $objEmpleados31 = new Empleados($mt2->getRegistro2(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados31 = new ControlEmpleados($objEmpleados31);
                $objControlEmpleados31->consultar();
                $NombreEmpleado = $objEmpleados31->getNombre();
                $objEmpleados32 = new Empleados($mt2->getRegistro2(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados32 = new ControlEmpleados($objEmpleados32);
                $objControlEmpleados32->consultar();
                $NombreAsignado = $objEmpleados32->getNombre();
                  if (empty($NombreAsignado)) {
                    $NombreAsignado2 = 'Sin Asginar';
                } else {
                    $NombreAsignado2 = $NombreAsignado;
                }
                                        
                echo '<tr>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $mt2->getRegistro1() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreAsignado2 . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $mt2->getRegistro3(). '</td>';
                echo '</tr>';
              }
                ?>

            </table>
              </div>
            
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