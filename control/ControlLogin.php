<?php

include '../control/ControlConexion.php';
include '../modelo/Empleados.php';
include '../control/ControlEmpleados.php';
//include '../index.php';
include'../modelo/CargoEmpleados.php';
include '../control/ControlCargoEmpleados.php';
include '../modelo/Cargos.php';
include '../control/ControlCargos.php';
include '../control/ControlAreas.php';
include '../modelo/Areas.php';

$objEmpleados = new Empleados('', '', '', '', '', '', '', '', '', '', '');
$objControlEmpleados = new ControlEmpleados($objEmpleados);
$MatrizDeUsuarios = $objControlEmpleados->listar();
$EmailIngreso = isset($_POST['txtemailingreso']) ? $_POST['txtemailingreso'] : '';
$DocumentoIngreso = isset($_POST['txtdocumentoingreso']) ? $_POST['txtdocumentoingreso'] : '';
$Swindicador = false;
$SwAdmin = false;
$SwJefeArea = false;
if ((isset($_POST['txtemailingreso']) && $_POST['txtemailingreso'] != '') && (isset($_POST['txtdocumentoingreso']) && $_POST['txtdocumentoingreso'] != '')) {
    foreach ($MatrizDeUsuarios as $Empleados2) {

        if (($Empleados2->getEmail() == $EmailIngreso) && ($Empleados2->getIdEmpleado() == $DocumentoIngreso)) {
            session_start();
            $Swindicador = true;
            echo 'Bienvenido a la página #1';
            $_SESSION['idempleado'] = $Empleados2->getIdEmpleado();
            $_SESSION['nombre'] = $Empleados2->getNombre();
            $_SESSION['foto'] = $Empleados2->getFoto();
            $_SESSION['hojavida'] = $Empleados2->getHojaVida();
            $_SESSION['telefono'] = $Empleados2->getTelefono();
            $_SESSION['email'] = $Empleados2->getEmail();
            $_SESSION['direccion'] = $Empleados2->getDireccion();
            $_SESSION['x'] = $Empleados2->getX();
            $_SESSION['y'] = $Empleados2->getY();
            $_SESSION['fkemplejefe'] = $Empleados2->getFkEmple_Jefe();
            $_SESSION['fkarea'] = $Empleados2->getFkArea();
            // $_SESSION['prueba']  = false;
            //$_SESSION['color']  = 'verde';
           // print_r($_SESSION);

            
            $_SESSION['ControlAdmin'] = $SwAdmin;
            $_SESSION['ControlJefeArea']=$SwJefeArea;
            $cargo = 1;
            $objCargoEmpleado = new CargoEmpleados('', $_SESSION['idempleado'], '', '');
            $objControlCargoEmpleado = new ControlCargoEmpleados($objCargoEmpleado);
            $MatrizcargosAux = $objControlCargoEmpleado->consultar();
            $objAreas = new Areas('', '', '');
            $objControlAreas = new ControlAreas($objAreas);
            $MatrizAreas2 = $objControlAreas->listar();
            foreach ($MatrizAreas2 as $Areas) {
                if ($Areas->getEmpleadoEncargado() == $_SESSION['idempleado']) {
                    $_SESSION['AreaControl'] = $Areas->getIdArea();
                    $SwJefeArea = true;
                    $_SESSION['ControlJefeArea'] = $SwJefeArea;

                   // break;
                } else {
                    $_SESSION['AreaControl'] = $Areas->getIdArea();
                    $_SESSION['ControlJefeArea'] = $SwJefeArea;
                }
            }

            foreach ($MatrizcargosAux as $Cargo) {
                if ($Cargo->getFkCargo() == $cargo) {
                    $SwAdmin = true;
                    $_SESSION['ControlAdmin'] = $SwAdmin;
                   // break;
                }
            }
        }
    }
    if ($SwAdmin) {
        $_SESSION['ControlAcceso'] = 'Verdadero';
    } else {
        $_SESSION['ControlAcceso'] = 'Falso';
    }
    if ($SwJefeArea) {
        $_SESSION['ControlAcceso2'] = 'Verdadero';
    } else {
        $_SESSION['ControlAcceso2'] = 'Falso';
    }
    if ($Swindicador) {
        // print_r($_SESSION); 
        echo '<script> alert("Correo electrónico y número de documento correctos \n Ahora será redirigido a la apliación")</script>';
        echo"<script> window.location='../vista/VistaRadicacion.php';</script>";
        //header('Refresh: 1; URL=../vista/VistaCrudAreasAux.php');
    } else {
        echo '<script> alert("Correo Electrónico Incorrecto o Número de documento incorrecto")</script>';
        // header('Refresh: 1; URL=../vista/VistaLogin.php');
        echo"<script> window.location='../vista/VistaLogin.php';</script>";
    }
} else {
    echo '<script> alert("No puede ingresar sin digitar Su Numero de Documneto y su email. \n Será Redirigido al índice nuevamente")</script>';
    //header('Refresh: 1; URL=index.php');
    echo"<script> window.location='../index.php';</script>";
}



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>