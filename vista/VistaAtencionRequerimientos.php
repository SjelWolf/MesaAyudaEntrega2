<!DOCTYPE html> 
<?php
include '../control/ControlDetalleRequerimientos.php';
include '../modelo/DetalleRequerimientos.php';
include '../control/ControlConexion.php';
include '../control/ControlEmpleados.php';
include '../control/ControlAreas.php';
include '../modelo/Empleados.php';
include '../modelo/Areas.php';
include '../modelo/Requerimientos.php';
include '../control/ControlRequerimientos.php';
$objDetalleRequerimientos = new DetalleRequerimientos('', '', '', '', '1', '', '');
$objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
$MatrizRequerimientos = $objControlDetalleRequerimientos->consultarportipo();
$accion = $_GET['Accion'];
$Codigo = $_GET['iddetalle'];
//print_r($_GET);
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d H:i:s');
$obj1 = new DetalleRequerimientos($_GET['iddetalle'], '', '', '', '', '', '');
$obj2 = new ControlDetalleRequerimientos($obj1);
$obj1 = $obj2->consultar();
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/vistaAtencion.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atención Requerimientos</title>
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

            <table border="1" class="table table-bordered table-striped">
                <tr border="1">
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >ID Detalle</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Fecha Detalle</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Observacion</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Requerimiento</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Area asignada</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Estado</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Empleado Que radicó</td>
                    <td style=" font-size: 25px;color:white;font-family:Comic Sans MS" >Empleado Asignado</td>
                </tr>
                <?php
                //$NombreAsignado2 = 'Prueba';
                $Estado = '';
                $objRequerimientoR1 = new Requerimientos($obj1->getFkReq(), '');
                $objControlRequerimientos1 = new ControlRequerimientos($objRequerimientoR1);
                $objControlRequerimientos1->consultar();
                $objArea1 = new Areas($objRequerimientoR1->getFkArea(), '', '');
                $objControlArea1 = new ControlAreas($objArea1);
                $objControlArea1->consultar();
                $NombreArea = $objArea1->getNombre();
                $objEmpleados31 = new Empleados($obj1->getFkEmple(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados31 = new ControlEmpleados($objEmpleados31);
                $objControlEmpleados31->consultar();
                $NombreEmpleado = $objEmpleados31->getNombre();
                $objEmpleados32 = new Empleados($obj1->getFkEmpleAsignado(), '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleados32 = new ControlEmpleados($objEmpleados32);
                $objControlEmpleados32->consultar();
                $NombreAsignado = $objEmpleados32->getNombre();
                echo '<tr>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $obj1->getIdDetalle() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $obj1->getFecha() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $obj1->getObservacion() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $obj1->getFkReq() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreArea . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $obj1->getFkEstado() . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreEmpleado . '</td>';
                echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS"  >' . $NombreAsignado . '</td>';

                if (empty($NombreAsignado)) {
                    $NombreAsignado2 = 'Sin Asginar';
                } else {
                    $NombreAsignado2 = $NombreAsignado;
                }
                switch ($obj1->getFkEstado()) {

                    case 1:
                        $Estado = 'Radicado';
                        break;
                    case 2:
                        $Estado = 'Asignado';
                        break;
                    case 3:
                        $Estado = 'Solución Parcial';
                        break;
                    case 4:
                        $Estado = 'Solución Total';
                        break;
                    default :
                        $Estado = 'Cancelado';
                        break;
                }
                ?>

            </table>
            <div class="container-main">
               
                <h1>Atencion Requerimientos</h1>
                <form class="form-signin" action="../control/ControlAtencionRequerimientos.php" method="post" name="form">
                    <div>
                        <center>
                        <div class="col-md-6">
                            <label>Id Detalle Requerimiento: <?php echo'' . $obj1->getIdDetalle(); ?></label>
                            <input type="hidden" name="txtdreq" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getIdDetalle(); ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Fecha Detalle: <?php echo'' . $obj1->getFecha(); ?></label>
                            <input type="hidden" name="txtfechadetalle" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getFecha(); ?>">
                        </div>
                        <div class="col-md-12">
                            <label>Observacion Anterior</label>
                            <textarea id="form24" class="form-styling" rows="20" cols="35" maxlength="4000" name="txtobservacion1" readonly> <?php echo '' . $obj1->getObservacion(); ?></textarea>


                        </div>
                        <div class="col-md-6">
                            <label>Id Requerimiento: <?php echo '' . $obj1->getFkReq(); ?></label>
                            <input type="hidden" name="txtidreq" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getFkReq(); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Area Asignada: <?php echo'' . $NombreArea ?></label>
                            <input type="hidden" name="txtarea" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $objRequerimientoR1->getFkArea(); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Estado:<?php echo'' . $Estado ?> </label>
                            <input type="hidden" name="txtestado" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getFkEstado(); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Empleado que radicó: <?php echo '' . $NombreEmpleado; ?> </label>
                            <br>
                            <input type="hidden" name="txtemrad" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getFkEmple(); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Empleado Asignado: <?php echo '' . $NombreAsignado2; ?></label>
                            <input type="hidden" name="txtemasig" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $obj1->getFkEmpleAsignado(); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Fecha Actual</label>
                            <input type="datetime-local" name="txtfecha" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $hoy; ?>" >
                        </div>
                        <div class="col-md-6">
                            <label>Vista Fecha Actual</label>
                            <input type="text" name="txtfecha2" id="codigo" class='form-control' maxlength="20" value="<?php echo'' . $hoy; ?>" readonly>
                        </div>
                        <br>
                        <br>
                        
                        <div class="col-md-12">

                            <label> Realice La observación de su solución</label>
                            <textarea id="form24" class="form-styling" rows="20" cols="35" maxlength="4000" name="txtobservacion"></textarea>
                        </div>

                        <div class="col-md-6">

                            <label>Asignar Estado de Solución del Requerimiento</label>
                            <select name="txtEstado" class="form-styling">
                                <option value="3">Solucionado Parcialmente</option>
                                <option value="4">Solucionado TotalMente</option>
                            </select> 
                        </div>

                        </center>
                        <center>
                            <input type="submit" name="accion"  class="rainbow-button" style="font-family:'Britannic'; color: red" value="Solucionar" id="enviar" style="text-align: center;">

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