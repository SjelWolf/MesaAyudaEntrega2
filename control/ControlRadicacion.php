
<?php

session_start();
include 'ControlRequerimientos.php';
include 'ControlDetalleRequerimientos.php';
include '../modelo/Requerimientos.php';
include '../modelo/DetalleRequerimientos.php';
include 'ControlConexion.php';
$fkEmple = $_SESSION['idempleado'];
if ((isset($_POST['txtfecha']) && $_POST['txtfecha'] != '') && (isset($_POST['txtobservacion']) && $_POST['txtobservacion'] != '') && (isset($fkEmple))) {
    $fkArea = $_POST['txtAreaRequerimiento'];
    $objRequerimientos = new Requerimientos('', $fkArea);
    $objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
    $objControlRequerimientos->guardar();
    $idDetalle = '';
    $fecha = $_POST['txtfecha'];
    $observacion = $_POST['txtobservacion'];
    $fkReq = $objControlRequerimientos->registroreciente();
    $fkEstado = '1';

    $fkEmpleAsignado = 'NULL';
    $objDetalleRequerimientos = new DetalleRequerimientos($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado);
    $objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
    $objControlDetalleRequerimientos->guardar();
    print_r($_POST);
    print_r($aux);
    echo '<script> alert("Su solicitud se ha radicado exitosamente. Ahora Será redirigido al índice")</script>';
    echo"<script> window.location='../index.php';</script>";
} else {
    echo '<script> alert("Debe iniciar sesion para radicar su requerimiento")</script>';
    echo '<script> alert("Ha ocurrido un error. Debe Ingresar La observacion de su requerimiento y tambien la fecha.")</script>';
    echo"<script> window.location='../index.php';</script>";
}
?>

