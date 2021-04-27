<?php

//para llamar a un metodo, hay que instaklar la clase, es decir crear un objeto de la clase.
//en php $nombreObjeto=new nombre clase=(argumentos)
//para llamar un metodo se escribe  $nombreobjeto_>nombremetodo(argumentos)

class ControlDetalleRequerimientos {

    var $objDetalleRequerimientos; //Variable de un objeto que sera de tipo Empleado

    function __construct($objDetalleRequerimientos) {
        $this->objDetalleRequerimientos = $objDetalleRequerimientos; //constructor de la clase Enpleado
    }

    function guardar() {
        //metodo de insercion en la tabla Empleados, hace uso de todos los atributos de la clase Empleados
        //$idDetalle = $this->objDetalleRequerimientos->getIdDetalle();
        $Fecha = $this->objDetalleRequerimientos->getFecha();
        $observacion = $this->objDetalleRequerimientos->getObservacion();
        $fkReq = $this->objDetalleRequerimientos->getFkReq();
        $fkEstado = $this->objDetalleRequerimientos->getFkEstado();
        $fkEmple = $this->objDetalleRequerimientos->getFkEmple();
        $fkEmpleAsignado = $this->objDetalleRequerimientos->getFkEmpleAsignado();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        //SW2 se usa para informar si el comando sql se ejecuto de forma correta, si es asi devuelve verdadero y si no devuelve falso, Se usa para hacer comprobaciones En el formulario
        $sw2 = $objControlConexion->ejecutarComandoSql("insert into detallereq values ('','" . $Fecha . "','" . $observacion . "'," . $fkReq . ",'" . $fkEstado . "','" . $fkEmple . "'," . $fkEmpleAsignado . ")");
        // ("INSERT INTO detallereq VALUES (null,'2021-03-26 19:02:59','no funciona el pc',1,'2','2',null)");
        if ($sw2) {
            echo '<script>alert("Registro Exitoso")</script>';
        } else { ////////////mensajes de alerta
            echo '<script>alert("Clave Primaria Repetida o Campos Vacios")</script>';
        }
        $objControlConexion->cerrarBd();
        return $sw2;
        //ejecutarComandoSql
        //ejecutarSelect
    }

    function consultar() {
        $idDetalle = $this->objDetalleRequerimientos->getIdDetalle();
        //$this->objDetalleRequerimientos->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq where IDDETALLE = " . $idDetalle . ";");
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $this->objDetalleRequerimientos->setIdDetalle($mostrar['IDDETALLE']);
                $this->objDetalleRequerimientos->setFecha($mostrar['FECHA']);
                $this->objDetalleRequerimientos->setObservacion($mostrar['OBSERVACION']);
                $this->objDetalleRequerimientos->setFkReq($mostrar['FKREQ']);
                $this->objDetalleRequerimientos->setfkEstado($mostrar['FKESTADO']);
                $this->objDetalleRequerimientos->setFkEmple($mostrar['FKEMPLE']);
                $this->objDetalleRequerimientos->setFkEmpleAsignado($mostrar['FKEMPLEASIGNADO']);
            }
        } //Metodo que consulta si un registro existe y lo aigna a una variable llamada resultado, se usa el fetch array para cambiar de los encabezados a los datos y se encapsulan
        $objControlConexion->cerrarBd();
        return $this->objDetalleRequerimientos;
    }
    //SELECT detallereq.FKREQ FROM detallereq  WHERE detallereq.FKESTADO='5' or detallereq.FKESTADO='4'

    function consultarportipo() {
        // $idDetalle= $this->objDetalleRequerimientos->getIdDetalle();
        $estado = $this->objDetalleRequerimientos->getFkEstado();
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq where FKESTADO='" . $estado . "';");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $idDetalle = $mostrar['IDDETALLE'];
                $fecha = $mostrar['FECHA'];
                $observacion = $mostrar['OBSERVACION'];
                $fkreq = $mostrar['FKREQ'];
                $fkestado = $mostrar['FKESTADO'];
                $fkemple = $mostrar['FKEMPLE'];
                $fkEmple_Asignado = $mostrar['FKEMPLEASIGNADO'];
                $objDetalleRequerimientos = new DetalleRequerimientos($idDetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkEmple_Asignado);
                $matriz[$i] = $objDetalleRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }

    function consultarasignadoempleado() {
        $estado = $this->objDetalleRequerimientos->getFkEstado();
        $EmpleAsignado = $this->objDetalleRequerimientos->getFkEmpleAsignado();
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq where FKESTADO='" . $estado . "' and FKEMPLEASIGNADO='" . $EmpleAsignado . "' ;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $idDetalle = $mostrar['IDDETALLE'];
                $fecha = $mostrar['FECHA'];
                $observacion = $mostrar['OBSERVACION'];
                $fkreq = $mostrar['FKREQ'];
                $fkestado = $mostrar['FKESTADO'];
                $fkemple = $mostrar['FKEMPLE'];
                $fkEmple_Asignado = $mostrar['FKEMPLEASIGNADO'];
                $objDetalleRequerimientos = new DetalleRequerimientos($idDetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkEmple_Asignado);
                $matriz[$i] = $objDetalleRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }
    function consultarTodoPorEmpleado() {
        $estado = $this->objDetalleRequerimientos->getFkEstado();
        $EmpleAsignado = $this->objDetalleRequerimientos->getFkEmpleAsignado();
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
       // $objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq where FKEMPLEASIGNADO='" . $EmpleAsignado . "' ;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $idDetalle = $mostrar['IDDETALLE'];
                $fecha = $mostrar['FECHA'];
                $observacion = $mostrar['OBSERVACION'];
                $fkreq = $mostrar['FKREQ'];
                $fkestado = $mostrar['FKESTADO'];
                $fkemple = $mostrar['FKEMPLE'];
                $fkEmple_Asignado = $mostrar['FKEMPLEASIGNADO'];
                $objDetalleRequerimientos = new DetalleRequerimientos($idDetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkEmple_Asignado);
                $matriz[$i] = $objDetalleRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }

    function consultarAUX() {
        $idDetalle = $this->objDetalleRequerimientos->getIdDetalle();
        //$this->objDetalleRequerimientos->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
       // $objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
       $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq where IDDETALLE = " . $idDetalle . ";");
        $SW;
        if ($resultado->num_rows === 0) {
            $SW = false;
        } else {
            $SW = true;
        }
        $objControlConexion->cerrarBd();
        return $SW;
        //metodo auxiliar de consulta, al igual que el consultar normal, este metodo devuelve verdadero si el recordset que devuelve el
        // ejecutar select contiene datos, en caso contrario devuelve falso
        //si la consulta que se realiza arrroja un conjunto de datos vacio
    }

    function modificar() {
        $idDetalle = $this->objDetalleRequerimientos->getIdDetalle();
        $Fecha = $this->objDetalleRequerimientos->getFecha();
        $observacion = $this->objDetalleRequerimientos->getObservacion();
        $fkReq = $this->objDetalleRequerimientos->getFkReq();
        $fkEstado = $this->objDetalleRequerimientos->getFkEstado();
        $fkEmple = $this->objDetalleRequerimientos->getFkEmple();
        $fkEmpleAsignado = $this->objDetalleRequerimientos->getFkEmpleAsignado();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("update detallereq set IDDETALLE='" . $idDetalle . "', FECHA='" . $Fecha . "', OBSERVACION='" . $observacion . "', FKREQ='" . $fkReq . "', FKESTADO='" . $fkEstado . "' FKEMPLE='" . $fkEmple . "', FKEMPLEASIGNADO=" . $fkEmpleAsignado . " where IDDETALLE = " . $idEmpleado . ";");
        $objControlConexion->cerrarBd();

        //Encapsulacion de datos mediante get, se guardan en variables y se guardan en variables que posteriormente se usaran para modificar un registro
    }

    function borrar() {
        //$this->objDetalleRequerimientos->setCodigo($codigo);
        $idDetalle = $this->objDetalleRequerimientos->getIdEmpleado();
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("delete from detallereq  where IDDETALLE = '" . $idDetalle . "';");
        $objControlConexion->cerrarBd();
        //elimina registros Segun el codigo que se envie
    }

    function listar() {
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from detallereq;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $idDetalle = $mostrar['IDDETALLE'];
                $fecha = $mostrar['FECHA'];
                $observacion = $mostrar['OBSERVACION'];
                $fkreq = $mostrar['FKREQ'];
                $fkestado = $mostrar['FKESTADO'];
                $fkemple = $mostrar['FKEMPLE'];
                $fkEmple_Asignado = $mostrar['FKEMPLEASIGNADO'];
                $objDetalleRequerimientos = new DetalleRequerimientos($idDetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkEmple_Asignado);
                $matriz[$i] = $objDetalleRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }
        function listaCancelados() {
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("SELECT detallereq.FKREQ FROM detallereq  WHERE detallereq.FKESTADO='5' or detallereq.FKESTADO='4';");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $fkreq = $mostrar['FKREQ'];
                $objDetalleRequerimientos = new DetalleRequerimientos('', '', '', $fkreq, '', '', '');
                $matriz[$i] = $objDetalleRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }

}

?>