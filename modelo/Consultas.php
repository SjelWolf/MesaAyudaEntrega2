<?php
class Consultas {
     var $Registro1;
     var $Registro2;
     var $Registro3;
     var $Registro4;
        function __construct($Registro1, $Registro2, $Registro3, $Registro4) {
            $this->Registro1 = $Registro1;
            $this->Registro2 = $Registro2;
            $this->Registro3 = $Registro3;
            $this->Registro4 = $Registro4;
        }

        function getRegistro1() {
            return $this->Registro1;
        }

        function getRegistro2() {
            return $this->Registro2;
        }

        function getRegistro3() {
            return $this->Registro3;
        }

        function getRegistro4() {
            return $this->Registro4;
        }

        function setRegistro1($Registro1) {
            $this->Registro1 = $Registro1;
        }

        function setRegistro2($Registro2) {
            $this->Registro2 = $Registro2;
        }

        function setRegistro3($Registro3) {
            $this->Registro3 = $Registro3;
        }

        function setRegistro4($Registro4) {
            $this->Registro4 = $Registro4;
        }


    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>