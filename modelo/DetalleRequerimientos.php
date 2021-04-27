<?php

class DetalleRequerimientos{
    
    var $idDetalle;
    var $fecha;
    var $observacion;
    var $fkReq;
    var $fkEstado;
    var $fkEmple;
    var $fkEmpleAsignado;
    function __construct($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado) {
        $this->idDetalle = $idDetalle;
        $this->fecha = $fecha;
        $this->observacion = $observacion;
        $this->fkReq = $fkReq;
        $this->fkEstado = $fkEstado;
        $this->fkEmple = $fkEmple;
        $this->fkEmpleAsignado = $fkEmpleAsignado;
    }
    function getIdDetalle() {
        return $this->idDetalle;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getFkReq() {
        return $this->fkReq;
    }

    function getFkEstado() {
        return $this->fkEstado;
    }

    function getFkEmple() {
        return $this->fkEmple;
    }

    function getFkEmpleAsignado() {
        return $this->fkEmpleAsignado;
    }

    function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setFkReq($fkReq) {
        $this->fkReq = $fkReq;
    }

    function setFkEstado($fkEstado) {
        $this->fkEstado = $fkEstado;
    }

    function setFkEmple($fkEmple) {
        $this->fkEmple = $fkEmple;
    }

    function setFkEmpleAsignado($fkEmpleAsignado) {
        $this->fkEmpleAsignado = $fkEmpleAsignado;
    }


}

?>

