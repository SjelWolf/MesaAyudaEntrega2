<?php

//para llamar a un metodo, hay que instaklar la clase, es decir crear un objeto de la clase.
//en php $nombreObjeto=new nombre clase=(argumentos)
//para llamar un metodo se escribe  $nombreobjeto_>nombremetodo(argumentos)

class ControlEstados {

    var $objEstado; //Variable de un objeto que sera de tipo Empleado

    function __construct($objEstado) {
        $this->objEstado = $objEstado; //constructor de la clase Enpleado
    }

    function guardar() {
        //metodo de insercion en la tabla Empleados, hace uso de todos los atributos de la clase Empleados
        $idEstado = $this->objEstado->getIdEstado();
        $nombre = $this->objEstado->getNombre();
        //$fkEmple = $this->objEstado->getEmpleadoEncargado();
        //$comandoSQL="insert into clientes values("insert into clientes values ('".$codigo."','".$nombre."','"  .$telefono."','".$email."',".$credito.")");
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        //SW2 se usa para informar si el comando sql se ejecuto de forma correta, si es asi devuelve verdadero y si no devuelve falso, Se usa para hacer comprobaciones En el formulario
        $sw2 = $objControlConexion->ejecutarComandoSql("insert into estado values ('" . $idEstado . "','" . $nombre . "')");
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
        $idEstado = $this->objEstado->getIdEstado();
        //$this->objEstado->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from estado where IDESTADO = '" . $idEstado . "';");
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $this->objEstado->setNombre($mostrar['NOMBRE']);
                //$this->objEstado->setTelefono($mostrar['FKEMPLE']);
                //$this->objEstado->setIdArea($mostrar['idArea']);
            }
        } //Metodo que consulta si un registro existe y lo aigna a una variable llamada resultado, se usa el fetch array para cambiar de los encabezados a los datos y se encapsulan
        $objControlConexion->cerrarBd();
        return $this->objEstado;
    }

    function consultarAUX() {
        $idEstado = $this->objEstado->getIdEstado();
        //$this->objEstado->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from estado where IDESTADO = '" . $idEstado . "';");
        $SW = true;
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
        $idEstado = $this->objEstado->getIdEstado();
        $nombre = $this->objEstado->getNombre();
        //$idArea = $this->objEstado->getIdArea();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("update estado set NOMBRE='" . $nombre . "' where IDESTADO = '" . $idEstado . "';");
        $objControlConexion->cerrarBd();
        //Encapsulacion de datos mediante get, se guardan en variables y se guardan en variables que posteriormente se usaran para modificar un registro
    }

    function borrar() {
        //$this->objEstado->setCodigo($codigo);
        $idEstado = $this->objEstado->getIdEstado();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("delete from estado  where IDESTADO = '" . $idEstado . "';");
        $objControlConexion->cerrarBd();
        //elimina registros Segun el codigo que se envie
    }

    function listar() {
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from estado;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $idEstado = $mostrar['IDESTADO'];
                $nombre = $mostrar['NOMBRE'];

                //$EmpleadoEncargado = $mostrar['FKEMPLE'];
                //$idArea = $mostrar['idArea'];
                $objEstado = new Estados($idEstado, $nombre);
                $matriz[$i] = $objEstado;
                $i++;
            }
        }
        return $matriz;
    }

}

?>