<?php

class ControlConsultas {

    var $objConsultas;

    function __construct($objConsultas) {
        $this->objConsultas = $objConsultas;
    }

    function consulta1() {
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("select area.NOMBRE as Nombre_Área,area.FKEMPLE ,COUNT(empleado.fkAREA) as TotalEmpleados from empleado
inner JOIN area on area.IDAREA=empleado.fkAREA GROUP by area.FKEMPLE;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $NombreArea = $mostrar['Nombre_Área'];
                $Fkemple = $mostrar['FKEMPLE'];
                $TotalEmpleados = $mostrar['TotalEmpleados'];
                //$idArea = $mostrar['idArea'];
                $objConsultas = new Consultas($NombreArea, $Fkemple, $TotalEmpleados, '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

    function consulta2() {  //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("SELECT empleado.NOMBRE as Nombre_Empleado,empleado.fkEMPLE_JEFE as Nombre_Lider,area.NOMBRE as Nombre_Area
 from empleado inner JOIN area on area.IDAREA=empleado.fkAREA");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $NombreEmpleado = $mostrar['Nombre_Empleado'];
                $NombreLider = $mostrar['Nombre_Lider'];
                $NombreArea = $mostrar['Nombre_Area'];
                //$idArea = $mostrar['idArea'];
                $objConsultas = new Consultas($NombreEmpleado, $NombreLider, $NombreArea, '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

    function consulta3($fecha1, $fecha2) {
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("select DISTINCT area.FKEMPLE, empleado.NOMBRE FROM empleado INNER JOIN area ON area.FKEMPLE=empleado.IDEMPLEADO
 INNER JOIN detallereq ON detallereq.FKEMPLE = empleado.IDEMPLEADO WHERE detallereq.FECHA
 BETWEEN '" . $fecha1 . "' and '" . $fecha2 . "' and area.FKEMPLE=detallereq.FKEMPLE");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $nombre = $mostrar['NOMBRE'];
                $idArea = $mostrar['IDAREA'];
                $EmpleadoEncargado = $mostrar['FKEMPLE'];
                //$idArea = $mostrar['idArea'];
               $objConsultas = new Consultas('', '', '', '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

    function consulta4($fecha1, $fecha2) {  //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("select detallereq.OBSERVACION, detallereq.FKREQ,detallereq.FKESTADO,estado.NOMBRE from detallereq 
inner join estado on estado.IDESTADO=detallereq.FKESTADO
WHERE detallereq.FECHA BETWEEN '" . $fecha1 . "' and '" . $fecha2 . "' and detallereq.FKESTADO='2' or detallereq.FKESTADO='3' ");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $nombre = $mostrar['NOMBRE'];
                $idArea = $mostrar['IDAREA'];
                $EmpleadoEncargado = $mostrar['FKEMPLE'];
                //$idArea = $mostrar['idArea'];
                 $objConsultas = new Consultas('', '', '', '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

    function consulta5() {  //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from area;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $nombre = $mostrar['NOMBRE'];
                $idArea = $mostrar['IDAREA'];
                $EmpleadoEncargado = $mostrar['FKEMPLE'];
                //$idArea = $mostrar['idArea'];
                 $objConsultas = new Consultas('', '', '', '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

    function consulta6() {  //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("select empleado.NOMBRE,empleado.X,empleado.Y from empleado;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $nombre = $mostrar['NOMBRE'];
                $X = $mostrar['X'];
                $Y = $mostrar['Y'];
                //$idArea = $mostrar['idArea'];
                $objConsultas = new Consultas($nombre, $X, $Y, '');
                $matriz[$i] = $objConsultas;
                $i++;
            }
        }
        return $matriz;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>