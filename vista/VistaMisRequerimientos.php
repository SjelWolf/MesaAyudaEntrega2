<?php
session_start();
$Empleados = $_SESSION['idempleado'];
$SwJefeArea = $_SESSION['ControlJefeArea'];
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
if($_SESSION['idempleado']!='123'){
     $objDetalleRequerimientos = new DetalleRequerimientos('', '', '', '', '1', '', $_SESSION['idempleado']);
$objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
     $MatrizRequerimientos = $objControlDetalleRequerimientos->consultarTodoPorEmpleado();
    }
 else {
    $objDetalleRequerimientos = new DetalleRequerimientos('', '', '', '', '1', '', '');
$objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
$MatrizRequerimientos = $objControlDetalleRequerimientos->listar();
    
}
//$MatrizRequerimientos=$objControlDetalleRequerimientos->consultarportipo();
$objDetalleRequerimientos1 = new DetalleRequerimientos('', '', '', '', '2', '', $Empleados);
$objControlDetalleRequerimientos1 = new ControlDetalleRequerimientos($objDetalleRequerimientos1);
$MatrizRequerimientos1 = $objControlDetalleRequerimientos1->consultarasignadoempleado();
$MatrizCanceladosFinalizados = $objControlDetalleRequerimientos->listaCancelados();
//print_r($MatrizCanceladosFinalizados);
//$sw3= false;
$matrizAux1 = array();
$i = 0;
foreach ($MatrizCanceladosFinalizados as $DetallesCancelados) {
    $matrizAux1[$i] = $DetallesCancelados->getFkReq();
    $i++;
}
//print_r($matrizAux1);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/vistaCargos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Requerimientos</title>
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
            <center> <h1 style=" font-size: 35px;color: turquoise;font-family:Comic Sans MS" >Mis Requerimientos</h1></center>
            <?php
               $sw3=false;
                if(!empty($MatrizRequerimientos)){
                    $sw3=TRUE;
                    //se detalla que una persona tiene requerimientos asignados o no
                }
                
                ?>
            <?php 
            if($sw3){
           echo' <table border="1" class="table table-bordered table-striped">
                <tr border="1">
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >ID Detalle</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Fecha Detalle</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Observacion</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Requerimiento</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Area asignada</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Estado</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Empleado Que radicó</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Empleado Asignado</td>
                    <td style=" font-size: 20px;color:yellow;font-family:Comic Sans MS" >Acción</td>
                </tr>';
            }
            ?>
                <?php
                $sw = false;
            
                if($sw3){
                //creacion de la tabla con la Matriz de Area y el ForEach
                foreach ($MatrizRequerimientos as $Requerimientos) {

                    $objRequerimientoR = new Requerimientos($Requerimientos->getFkReq(), '');
                    $objControlRequerimientos = new ControlRequerimientos($objRequerimientoR);
                    $objControlRequerimientos->consultar();
                    $objArea = new Areas($objRequerimientoR->getFkArea(), '', '');
                    $objControlArea = new ControlAreas($objArea);
                    $objControlArea->consultar();
                    $NombreArea = $objArea->getNombre();
                    $objEmpleados3 = new Empleados($Requerimientos->getFkEmple(), '', '', '', '', '', '', '', '', '', '');
                    $objControlEmpleados3 = new ControlEmpleados($objEmpleados3);
                    $objControlEmpleados3->consultar();
                    $NombreEmpleado = $objEmpleados3->getNombre();
                    $objEmpleados31 = new Empleados($Requerimientos->getFkEmpleAsignado(), '', '', '', '', '', '', '', '', '', '');
                    $objControlEmpleados31 = new ControlEmpleados($objEmpleados31);
                    $objControlEmpleados31->consultar();
                    $NombreAsignado1 = $objEmpleados31->getNombre();
                    if (empty($NombreAsignado1)) {
                        $NombreAsignado1 = 'Sin Asignar';
                    }
                    $Estado1 = '';
                    switch ($Requerimientos->getFkEstado()) {
                        case '1':
                            $Estado1 = 'Radicado';
                            $Color = 'white';
                            break;
                        case '2':
                            $Estado1 = 'Asignado';
                            $Color = 'orange';

                            break;
                        case '3':
                            $Estado1 = 'Solución Parcial';
                            $Color = 'greenyellow';
                            break;
                        case '4':
                            $Estado1 = 'Solución Total';
                            $Color = 'turquoise';
                            break;
                        default :
                            $Estado1 = 'Cancelado';
                            $Color = 'red';
                            break;
                    }
                    ?>
                    <tr border="1">
                        <?php
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $Requerimientos->getIdDetalle() . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $Requerimientos->getFecha() . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $Requerimientos->getObservacion() . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $Requerimientos->getFkReq() . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreArea . '</td>';
                        echo '<td style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >' . $Estado1 . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreEmpleado . '</td>';
                        echo '<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >' . $NombreAsignado1 . '</td>';
                        echo'<td style=" font-size: 15px;color:white;font-family:Comic Sans MS" >';
                        $j = 0;
                        foreach ($matrizAux1 as $mt) {
                            if ($mt == $Requerimientos->getFkReq()) {
                                $sw = true;
                                break;
                            }
                            //$j++;
                        }
                        if (!$sw) {
                            if ($Requerimientos->getFkEstado() == '1') {
                                echo'<a style=" font-size: 15px;color:white;font-family:Comic Sans MS" href="VistaAsignacion.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&CodArea=' . $objRequerimientoR->getFkArea() . '"><i class="material-icons"></i>Asignar</a>';
                                // break;
                            } else if ($Requerimientos->getFkEstado() == '2' || $Requerimientos->getFkEstado() == '3') {
                                echo'<a style=" font-size: 15px;color:yellow;font-family:Comic Sans MS" href="VistaAtencionRequerimientos.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&Accion=Solucionar"><i class="material-icons"></i>Solucionar</a>';
                               if($_SESSION['idempleado']=='123'|| $_SESSION['ControlJefeArea']){
                                echo'<a style=" font-size: 15px;color:red;font-family:Comic Sans MS" href="VistaCancelacion.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&Accion=Cancelar"><i class="material-icons"></i>Cancelar</a>';
                               } // break;
                            } else if ($Requerimientos->getFkEstado() == '5') {
                                echo'<a>Finalizado: Cancelado</a>';
                                echo '</td>';
                                //continue;
                            } else if ($Requerimientos->getFkEstado() == '4') {
                                echo'<a>Finalizado: Solucionado Totalmente</a>';
                                echo '</td>';
                                //break;
                            }
                        } else {
                            if ($Requerimientos->getFkEstado() == '1') {
                                echo'<a style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >Finalizado: Radicado</a>';
                            echo '</td>';
                            }
                            if ($Requerimientos->getFkEstado() == '2') {
                                echo'<a style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >Finalizado: Asignado</a>';
                            echo '</td>';
                            }
                            if ($Requerimientos->getFkEstado() == '3') {
                                echo'<a style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >Finalizado: Solucion Parcial</a>';
                            echo '</td>';
                            }
                            if ($Requerimientos->getFkEstado() == '4') {
                                echo'<a style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >Finalizado: Solucion Total</a>';
                            echo '</td>';
                            }
                            if ($Requerimientos->getFkEstado() == '5') {
                                echo'<a style=" font-size: 15px;color:' . $Color . ';font-family:Comic Sans MS" >Finalizado: Cancelado</a>';
                            echo '</td>';
                            }

                            
                        }
                        $sw=false;
                 
                    }
                   
                } else{
                    echo' <center> <h1 style=" font-size: 35px;color: yellow;font-family:Comic Sans MS" >No tiene Requerimientos Asignados</h1></center>';
                }

                    /* echo '<h1>'.$DetallesCancelados->getFkReq().''.$Requerimientos->getFkReq().'</h1>';

                      if ($DetallesCancelados->getFkReq() == $Requerimientos->getFkReq()) {

                      //  break;
                      } else {
                      //&&
                      if($DetallesCancelados->getFkReq() != $Requerimientos->getFkReq()){
                      if ($Requerimientos->getFkEstado() != '5' && $Requerimientos->getFkEstado() != '4' ) {
                      if($DetallesCancelados->getFkReq() != $Requerimientos->getFkReq()){
                      if ($Requerimientos->getFkEstado() == '2' || $Requerimientos->getFkEstado() == '3') {
                      echo'<a style=" font-size: 15px;color:yellow;font-family:Comic Sans MS" href="VistaAtencionRequerimientos.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&Accion=Solucionar"><i class="material-icons"></i>Solucionar</a>';
                      echo'<a style=" font-size: 15px;color:red;font-family:Comic Sans MS" href="VistaCancelacion.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&Accion=Cancelar"><i class="material-icons"></i>Cancelar</a>';
                      }
                      //  if (($DetallesCancelados->getFkReq() != $Requerimientos->getFkReq())) {
                      if ($Requerimientos->getFkEstado() == '1' && $Requerimientos->getFkEstado() != '2' && $Requerimientos->getFkEstado() != '3' && $Requerimientos->getFkEstado() != '4' && $Requerimientos->getFkEstado() != '5') {

                      echo'<a style=" font-size: 15px;color:white;font-family:Comic Sans MS" href="VistaAsignacion.php?iddetalle=' . $Requerimientos->getIdDetalle() . '&CodArea=' . $objRequerimientoR->getFkArea() . '"><i class="material-icons"></i>Asignar</a>';
                      }

                      /* if($_SESSION['ControlJefeArea'])
                      { echo'<a href="VistaAtencionRequerimientos.php?iddetalle='.$Requerimientos->getIdDetalle().'&Accion=Asignar"class="edit" title="editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i>Asignar</a>';
                      echo'<a href="VistaAtencionRequerimientos.php?iddetalle='.$Requerimientos->getIdDetalle().'&Accion=Cancelar"class="edit" title="editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i>Cancelar</a>';
                      } */
                    //} 
                    /*   }
                      else {
                      echo'<a>Finalizado</a>';
                      echo '</td>';

                      //*  } else {

                      }
                      }
                      //break;
                      ?>
                      <?php
                      }
                      echo'<a>Finalizado</a>';
                      echo '</td>';
                      echo 'yugi' . $DetallesCancelados->getFkReq();

                      }

                      //
                      }
                      reset($MatrizCanceladosFinalizados);
                      } */
                    ?>
                    
                </tr>
            </table>
      
        </main>
        <footer>
<?php include "../footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>