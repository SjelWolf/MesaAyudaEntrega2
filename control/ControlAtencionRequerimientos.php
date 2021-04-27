<?php

//print_r($_POST);
include '../modelo/DetalleRequerimientos.php';
include'../control/ControlConexion.php';
include '../control/ControlDetalleRequerimientos.php';
$objDetalleRequerimientos1 = new DetalleRequerimientos('', '', '', '', '', '', '');
$objControlDetalleRequerimientos1 = new ControlDetalleRequerimientos($objDetalleRequerimientos1);
//$MatrizRequerimientos1 = $objControlDetalleRequerimientos1->consultarasignadoempleado();
$MatrizCanceladosFinalizados = $objControlDetalleRequerimientos1->listaCancelados();
$sw = false;
$matrizAux1 = array();
$i = 0;
foreach ($MatrizCanceladosFinalizados as $DetallesCancelados) {
    $matrizAux1[$i] = $DetallesCancelados->getFkReq();
    $i++;
}
//print_r($MatrizCanceladosFinalizados);
//print_r($matrizAux1);
//print_r($_POST);

//$idreq= isset($_POST['txtidreq']) ? $_POST[''txtidreq'']. NULL;
$Areas = isset($_POST['txtarea']) ? $_POST['txtarea'] : '';
//$observacion= isset($_POST['txtobservacion']) ? $_POST['txtobservacion']: NULL;
$fkEstado = isset($_POST['txtestadoant']) ? $_POST['txtestadoant'] : '';
$fkEstado1 = isset($_POST['txtEstado']) ? $_POST['txtEstado'] : '';
//txtestadoant
$fecha = isset($_POST['txtfecha']) ? $_POST['txtfecha'] : '';
$fkEmpleAsignado = isset($_POST['txtemasig']) ? $_POST['txtemasig'] : '';
$fkEmple = isset($_POST['txtemrad']) ? $_POST['txtemrad'] : '';
$fkReq = isset($_POST['txtidreq']) ? $_POST['txtidreq'] : '';
switch ($_POST['accion']) {
    case 'Solucionar':
        //$j = 0;
        foreach ($matrizAux1 as $mt) {
            if ($mt == $fkReq) {
                $sw = true;
            }
           // $j++;
        }
        if (!$sw) {
//  if ($fkEstado != '5') {
            $observacion = isset($_POST['txtobservacion']) ? $_POST['txtobservacion'] : 'Sin Detallar';
            if ((isset($Areas) && $Areas != '') && (isset($fkEstado1) && $fkEstado1 != '') && (isset($fecha) && $fecha != '') && (isset($fkEmpleAsignado) && $fkEmpleAsignado != '') && (isset($fkEmple) && $fkEmple != '') && (isset($fkReq) && $fkReq != '') && (isset($observacion) && $observacion != '')) {
                $objDetalleRequerimientos = new DetalleRequerimientos('', $fecha, $observacion, $fkReq, $fkEstado1, $fkEmple, $fkEmpleAsignado);
                $objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
                $sw = $objControlDetalleRequerimientos->guardar();
                if ($sw) {
                    echo '<script>alert("Atención del Requerimiento Exitosa")</script>';
                   echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                } else {
                    echo '<script>alert("Ha ocurrido un Error")</script>';
                   echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                }
            } else {
                echo '<script>alert("Ha dejado Algun Campo Vacio")</script>';
                echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
            }
        } else {
            echo '<script>alert("No se Puede solucionar un requerimiento que ya ha sido cancelado o solucionado totalmente")</script>';
echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
        }
        break;
    case 'Cancelar':
        //$j = 0;
        foreach ($matrizAux1 as $mt) {
            if ($mt == $fkReq) {
                $sw = true;
            }
           // $j++;
        }
        if (!$sw) {
// if ($fkEstado != '5') {
            $observacion = isset($_POST['txtobservacion']) ? $_POST['txtobservacion'] : 'Sin especificar';
            if ((isset($Areas) && $Areas != '') && (isset($fkEstado) && $fkEstado != '') && (isset($fecha) && $fecha != '') && (isset($fkEmple) && $fkEmple != '') && (isset($fkReq) && $fkReq != '') && (isset($observacion) && $observacion != '')) {
                $objDetalleRequerimientos = new DetalleRequerimientos('', $fecha, $observacion, $fkReq, $fkEstado1, $fkEmple, $fkEmpleAsignado);
                $objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
                $sw = $objControlDetalleRequerimientos->guardar();
                if ($sw) {
                    echo '<script>alert("El Requerimiento se Ha realizado de Manera Exitosa")</script>';
                   echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                } else {
                    echo '<script>alert("Ha ocurrido un Error")</script>';
                   echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                }
            } else {
                echo '<script>alert("Ha dejado Algún Campo Vacio")</script>';
               echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
            }
        } else {
            echo '<script>alert("El Requerimiento ya fue Cancelado.")</script>';
            echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
        }
        break;
   
    case 'Asignar':
       // $j = 0;
        foreach ($matrizAux1 as $mt) {
            if ($mt == $fkReq) {
                $sw = true;
            }
            //$j++;
        }
        if (!$sw) {
// if ($fkEstado != '5') {
            $observacion = isset($_POST['txtobservacion1']) ? $_POST['txtobservacion1'] : 'Sin Especificar';
              if ((isset($Areas) && $Areas != '') && (isset($fkEstado1) && $fkEstado1 != '') && (isset($fecha) && $fecha != '') && (isset($fkEmple) && $fkEmple != '') && (isset($fkReq) && $fkReq != '') && (isset($observacion) && $observacion != '')) {
            $objDetalleRequerimientos = new DetalleRequerimientos('', $fecha, $observacion, $fkReq, $fkEstado1, $fkEmple, $fkEmpleAsignado);
            $objControlDetalleRequerimientos = new ControlDetalleRequerimientos($objDetalleRequerimientos);
            $sw = $objControlDetalleRequerimientos->guardar();
          
                if ($sw) {
                    echo '<script>alert("El Requerimiento Ha sido asginado de Manera Exitosa")</script>';
                    echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                } else {
                    echo '<script>alert("Ha ocurrido un Error")</script>';
                   echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
                }
            } else {
                echo '<script>alert("Ha dejado Algún Campo Vacio")</script>';
               echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
            }
        } else {
            echo '<script>alert("No se Puede asignar un requerimiento que ya ha sido cancelado o solucionado totalmente")</script>';
            echo"<script> window.location='../vista/VistaMisRequerimientos.php';</script>";
        }
      break;
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>