<?php

//para llamar a un metodo, hay que instaklar la clase, es decir crear un objeto de la clase.
//en php $nombreObjeto=new nombre clase=(argumentos)
//para llamar un metodo se escribe  $nombreobjeto_>nombremetodo(argumentos)

class ControlRequerimientos {

    var $objRequerimientos; //Variable de un objeto que sera de tipo Empleado

    function __construct($objRequerimientos) {
        $this->objRequerimientos = $objRequerimientos; //constructor de la clase Enpleado
    }

    function guardar() {
        //metodo de insercion en la tabla Empleados, hace uso de todos los atributos de la clase Empleados
        // $idreq = $this->objRequerimientos->getIdReq();
        $fkarea = $this->objRequerimientos->getFkArea();
        // $fkEmple = $this->objRequerimientos->getEmpleadoEncargado();
        //$comandoSQL="insert into clientes values("insert into clientes values ('".$codigo."','".$nombre."','"  .$telefono."','".$email."',".$credito.")");
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        //SW2 se usa para informar si el comando sql se ejecuto de forma correta, si es asi devuelve verdadero y si no devuelve falso, Se usa para hacer comprobaciones En el formulario
        $sw2 = $objControlConexion->ejecutarComandoSql("insert into requerimiento(FKAREA) values ('" . $fkarea . "')");
        if ($sw2) {
            echo '<script>alert("Registro Exitoso Del requerimiento")</script>';
        } else { ////////////mensajes de alerta
            echo '<script>alert("Clave Primaria Repetida o Campos Vacios")</script>';
        }
        $objControlConexion->cerrarBd();
        return $sw2;
        //ejecutarComandoSql
        //ejecutarSelect
    }

    function registroreciente() {
        $ultimoid;
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $ultimoid = $objControlConexion->ejecutarSelect("SELECT MAX(IDREQ) AS id from requerimiento");
        $prueba = $ultimoid->fetch_array();
        $prueba4 = $prueba['id'];
        $objControlConexion->cerrarBd();
        return $prueba4;
    }

    function consultar() {
        $idreq = $this->objRequerimientos->getIdReq();
        //$this->objRequerimientos->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
       $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from requerimiento where IDREQ = " . $idreq . ";");
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                $this->objRequerimientos->setFkArea($mostrar['FKAREA']);
                //$this->objRequerimientos->setTelefono($mostrar['FKEMPLE']);
                //$this->objRequerimientos->setIdArea($mostrar['idArea']);
            }
        } //Metodo que consulta si un registro existe y lo aigna a una variable llamada resultado, se usa el fetch array para cambiar de los encabezados a los datos y se encapsulan
        $objControlConexion->cerrarBd();
        return $this->objRequerimientos;
    }

    function consultarAUX() {
        $idReq = $this->objRequerimientos->getIdReq();
        //$this->objRequerimientos->setIdEmpleado($idEmpleado);
        $objControlConexion = new ControlConexion();
       // $objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
       $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from requerimiento where IDREQ = " . $idReq . ";");
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
        $fkarea = $this->objRequerimientos->getFkArea();
        //$fkEmple = $this->objRequerimientos->getEmpleadoEncargado();
        $idReq = $this->objRequerimientos->getIdReq();
        $objControlConexion = new ControlConexion();
        //$objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("update requerimiento set FKAREA='" . $fkarea . "' where IDREQ = " . $idReq . ";");
        $objControlConexion->cerrarBd();
        //Encapsulacion de datos mediante get, se guardan en variables y se guardan en variables que posteriormente se usaran para modificar un registro
    }

    function borrar() {
        //$this->objRequerimientos->setCodigo($codigo);
        $idReq = $this->objRequerimientos->getIdReq();
        $objControlConexion = new ControlConexion();
       // $objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $objControlConexion->ejecutarComandoSql("delete from requerimiento  where IDREQ = '" . $idReq . "';");
        $objControlConexion->cerrarBd();
        //elimina registros Segun el codigo que se envie
    }

    function listar() {
        //este metodo busca todos los registros de la tabla, los guarda en cinco variables, crea un objeto de la clase area y los envia a una matriz, hace uso de fetch array
        $objControlConexion = new ControlConexion();
       // $objControlConexion->abrirBd("localhost", "id16682389_jdiez", "Juandiez123*", "id16682389_mesa_ayuda");
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $resultado = $objControlConexion->ejecutarSelect("Select * from requerimiento;");
        $matriz = array();
        $i = 0;
        if ($resultado) {
            while ($mostrar = $resultado->fetch_array()) {
                //echo $mostrar['codigo'] . $mostrar['nombre'] . $mostrar['telefono'].$mostrar['email'].$mostrar['credito'].'<br>' ;
                $fkarea = $mostrar['FKAREA'];
                $idreq = $mostrar['IDREQ'];
                //$EmpleadoEncargado = $mostrar['FKEMPLE'];
                //$idArea = $mostrar['idArea'];
                $objRequerimientos = new Requerimientos($idreq, $fkarea);
                $matriz[$i] = $objRequerimientos;
                $i++;
            }
        }
        return $matriz;
    }

}

?>