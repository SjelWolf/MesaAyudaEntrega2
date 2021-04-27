<!DOCTYPE html>
<?php
session_start();
//inclusion de Algunas clases de Control y Modelo para la creacion de una tabla con todos los registros de Area
include '../control/ControlCargos.php';
include '../modelo/Cargos.php';
include '../control/ControlConexion.php';
include '../control/ControlEmpleados.php';
include '../modelo/Empleados.php';
include '../modelo/CargoEmpleados.php';
include '../control/ControlCargoEmpleados.php';

$objEmpleados = new Empleados('', '', '', '', '', '', '', '', '', '', '');
$objControlEmpleados = new ControlEmpleados($objEmpleados);
$MatrizEmpleados = $objControlEmpleados->listar();
$objcargos = new Cargos('', '');
$objControlCargos = new ControlCargos($objcargos);
$MatrizCargos = $objControlCargos->listar();
$objCargos; // se crea la matriz de areas y despues se usara foreach para imprimri cada dato en la tabla en su correspondiente posicion
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
//se guarda en una variable llamada accion el valor que se trae de los botones mediante el metodo POST
    echo '<h1> <center> <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" > La Opción que se ha elegido es:  ' . $accion . '</p></center></h1>';
//echo'<p style=" font-size: 45px;font-family:Britannic" ></p>';
} else {
    $accion = null;
}
//Se asigna los valores guardados en POSt a diferentes variables donde se vana guardar los datos que se usarán para operar los diferentes metodos
$idempleado = isset($_POST['txtEmpleado']) ? $_POST['txtEmpleado'] : 'NULL';
$cargo = isset($_POST['txtcargo']) ? $_POST['txtcargo'] : 'NULL';
$fechafin = isset($_POST['txtfechafin']) ? $_POST['txtfechafin'] : 'NULL';
$fechainicio = isset($_POST['txtfechainicio']) ? $_POST['txtfechainicio'] : 'NULL';
//print_r($_POST);
switch ($accion) {// declaración de una Estructura Switch para manejar las diferentes opciones
    case 'Crear':
        if ((isset($_POST['txtEmpleado']) && $_POST['txtEmpleado'] != 'NULL') && (isset($_POST['txtcargo']) && $_POST['txtcargo'] != 'NULL') && (isset($_POST['txtfechainicio']) && $_POST['txtfechainicio'] != 'NULL')) {
            $objCargoEmpleado = new CargoEmpleados($cargo, $idempleado, $fechainicio, $fechafin); //Se instancia la clase Cargoempleados y se declara un objeto de tipo cargoempleados y se crea un objeto cargoempleados mediante el constructor
            $objControlCargoEmpleado = new ControlCargoEmpleados($objCargoEmpleado); //se instancia la clase control cargoempleado y se crea un objeto de tipo control area
            $inserto = $objControlCargoEmpleado->guardar(); //en la variable inserto se guarda el resultado del query, ya sea falso o verdadero y se usará para mostrar mensajes emergentes
            //que hablarán del estado del query
            if ($inserto) {
                echo '<script> alert("Registro Completado con éxito1")</script>';
                header('Refresh: 1; URL=VistaCrudCargosEmpleadosAux.php'); //una vez completada la accion, esto recargará la pagina y se actualizará los registros que se estan mostrando en las tablas, los cuales se traen directamente 
                //de la base dedatos
            } else {
                echo '<script> alert("El registro no se pudo guardar; Ya existe; no debe repetirse o los campos estan vacios")</script>';
            }
        } else {
            echo'<script>alert("No puede Dejar el Empleado ni el cargo ni la fecha de inicio sin asignar")</script>';
        }
        $accion = null;
        break;
    case'Consultar':
        if (isset($_POST['txtEmpleado']) && $_POST['txtEmpleado'] != '') { //esto se hace para que el metodo consultar se ejecute con un codigo, en caso contrario, se emitirira un mensaje donde avise que
            // //se necesita un codigo para realizar dicha operación
            $objCargoEmpleados = new CargoEmpleados('', $idempleado, '', '');
            $objControlCargoEmpleados = new ControlCargoEmpleados($objCargoEmpleados);
            //$objControlCargoEmpleados->consultar();
            $ExisteRegistro = $objControlCargoEmpleados->consultarAUX($objCargoEmpleados->getFkEmple()); //metodo auxilair que nos ayudará a saber si una consulta devuelve un recordset vacio o no vacio
            //--Uso Auxiliar------Fin
            if ($ExisteRegistro) {
                //para este consultar se hace algo mas particular: se instancia la clase empleado y se instancia la clase cargo empleado, con los controles de ambas. luego mediante el codigo se busca el nombre del empleado
                //y se imprime una tabla con todos los cargos asociasos a un mismo empleado
                $objCargoEmpleados1 = new CargoEmpleados('', $idempleado, '', '');
                $objControlCargoEmpleado1 = new ControlCargoEmpleados($objCargoEmpleados1);
                $MatrizEmpleadoCargo = $objControlCargoEmpleado1->consultar();
                print_r($MatrizEmpleadoCargo);
                $objEmpleadoAux = new Empleados($idempleado, '', '', '', '', '', '', '', '', '', '');
                $objControlEmpledosAux3 = new ControlEmpleados($objEmpleadoAux);
                $NombreEmpleadoF = $objControlEmpledosAux3->consultar();
                $NombreDF = $objEmpleadoAux->getNombre();
                echo'<center>';
                echo '<table border="1" class="table table-bordered table-striped">';
                echo '<tr border="1">';
                echo' <td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Cargo</td>';
                echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Nombre Empleado</td>';
                echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Fecha Inicio</td>';
                echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Fecha Finzalizacion</td>';
                echo '</tr>';
                echo' <br>';
                //creacion de la tabla con la Matriz de Area y el ForEach
                foreach ($MatrizEmpleadoCargo as $Cargos) {
                    //$objEmpleado= new Empleados($idempleado, '', '', '', '', '', '', '', '', '', '');
                    $objCargosAux = new Cargos($Cargos->getFkCargo(), '');
                    $objControlCargoAux = new ControlCargos($objCargosAux);
                    $objControlCargoAux->consultar();
                    $NombreCargo = $objCargosAux->getNombreCargo();
                    ?>
                    <tr border="1">
                        <?php
                        echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >' . $NombreCargo . '</td>';
                        echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >' . $NombreDF . '</td>';
                        echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >' . $Cargos->getFechaIni() . '</td>';
                        echo '<td style=" font-size: 45px;color:white;font-family:Comic Sans MS" >' . $Cargos->getFechaFin() . '</td>';
                        ?>
                        <?php
                    }
                    ?>
                    <?php
                    echo '</tr>';
                    echo '</table>';
                    echo'</center>';
                    echo'<script>alert("Registro EnContrado")</script>';
                } else { //mensajes de alerta
                    echo'<script>alert("Cargo Por empleado no Encontrado")</script>';
                }
            } else {
                echo'<script>alert("Necesita el Codigo Para continuar la operación")</script>';
            }
            $accion = null;
            break;
        case 'Eliminar':
            if ((isset($_POST['txtEmpleado']) && $_POST['txtEmpleado'] != 'NULL') && (isset($_POST['txtcargo']) && $_POST['txtcargo'] != 'NULL')) {
                //Creacion e instanciacion de objetos cargoempleado usando la clase cargoempleados, la clase control cargoempleado y uso del metodo auxiliar que verifica que el registro sí existe
                $objCargoEmpleado = new CargoEmpleados($cargo, $idempleado, '', '');
                $ObjControlCargoEmpleados = new ControlCargoEmpleados($objCargoEmpleado);
                $CodigoAUX = 'Codigo Empleado: ' . $objCargoEmpleado->getFkCargo() . ' Empleado Codigo: ' . $objCargoEmpleado->getFkEmple();
                $ExisteRegistro = $ObjControlCargoEmpleados->consultarAUX2();

                if ($ExisteRegistro) {//Si el registro existe, Ejecuta el eliminar,
                    //en caso contrario notifica que el registro no existe
                    $ObjControlCargoEmpleados->borrar();
                    echo '<script> alert("Se ha Eliminado con Exito el Registro asociado al codigo: ' . $CodigoAUX . ' Recuerde Refrescar la pagina para ver la actualización de la Base de Datos")</script>';
                    echo '<script> alert("La página Web Se actualizará automaticamente ")</script>';
                    header('Refresh: 1; URL=VistaCrudCargosEmpleadosAux.php');  //una vez completada la accion, esto recargará la pagina y se actualizará los registros que se estan mostrando en las tablas, los cuales se traen directamente 
                    //de la base de datos
                } else {
                    echo '<script> alert("El registro Asociado Al codigo : ' . $CodigoAUX . ' No Existe. \n Vuelva a Intentar con Otro Codigo \n Recuerde no Dejar El Codigo Vacío ")</script>';
                }
            } else {
                echo'<script>alert("Necesita Seleccionar el empleado y el cargo Para continuar la operación")</script>';
            }
            $accion = null;

            break;
        case 'Actualizar':
            if ((isset($_POST['txtEmpleado']) && $_POST['txtEmpleado'] != 'NULL') && (isset($_POST['txtcargo']) && $_POST['txtcargo'] != 'NULL')) {
                //Creacion e instanciacion de objetos cargoempleado usando la clase cargoempleado, la clase control cargoempleado y uso de metodo auxiliar que verifica que el registro sí exista
                $objCargoEmpleados = new CargoEmpleados($cargo, $idempleado, $fechainicio, $fechafin);
                $objControlCargoEmpleados = new ControlCargoEmpleados($objCargoEmpleados);
                $CodigoAUX = 'Codigo Empleado: ' . $objCargoEmpleados->getFkCargo() . ' Empleado Codigo: ' . $objCargoEmpleados->getFkEmple();
                $ExisteRegistro = $objControlCargoEmpleados->consultarAUX2();
                if ($ExisteRegistro) {
                    //el registro existe, Ejecuta el actualizar,
                    //en caso contrario notifica que el registro no existe

                    $objControlCargoEmpleados->modificar();
                    echo '<script> alert("El regstro asociado al codigo: ' . $CodigoAUX . ' Ha sido modificado con éxito Recuerde Refrescar la pagina para ver la actualización de la Base de Datos")</script>';
                    echo '<script> alert("La página Web Se actualizará automaticamente ")</script>';
                    header('Refresh: 1; URL=VistaCrudCargosEmpleadosAux.php');
                } else {
                    echo '<script> alert("El regstro asociado al codigo: ' . $CodigoAUX . ' No ha podio modificarse. Es posible que el registro asociado a dicho codigo no exista. \n INtente de nuevo")</script>';
                }
            } else {
                echo'<script>alert("Necesita Seleccionar el empleado y el cargo Para continuar la operación")</script>';
            }
            $accion = null;
            break;
    }
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../img/logo_size.jpg">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/vistaCargosEmpleados.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C.R.U.D de Cargos Por Empleado</title>
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
       
                echo '<p><a href="#">Bienvenido: '?><?php  if(empty(!$_SESSION)){echo''.$_SESSION['nombre'];} ?><?php echo'</a></p>';
                }
                ?>
            </div>
            <script>

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

            <div class="container-main">
                <h1>CRUD De cargo por empleado</h1>
                <form action="VistaCrudCargosEmpleadosAux.php" method="POST">

                    <div class="container-in">
                        <label class="label">Fecha Inicio:</label>     
                        <div class="input-content"> 
                            <input type="date" name="txtfechainicio" id="codigo" class="text-box" maxlength="10">
                        </div>
                    </div>

                    <div class="container-in">
                        <label class="label"><p>Fecha Finalización:</p></label>
                        <div class="input-content">
                            <input type="date" name="txtfechafin" id="nombre" class="text-box" maxlength="50">
                        </div>
                    </div>

                    <div class="container-in">
                        <label clas="label"><p>Empleado Para Cargo:</p></label>
                        <div class="input-content">
                        <select name="txtEmpleado" class="text-box"  aria-label=".form-select-lg example">
                                <?php
                                    foreach ($MatrizEmpleados as $Empleados) {
                                    //Creacion de un select con todos los empleados registrados en la base de datos, se usa nada más su nombre y codigo.
                                    echo '<option value=' . $Empleados->getIdEmpleado() . '>' . $Empleados->getNombre() . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="container-in">
                        <label clas="label"><p>Cargo a Asignar:</p></label>
                        <div class="input-content">
                            <select name="txtcargo" class="text-box" aria-label=".form-select-lg example">
                                <?php
                                    foreach ($MatrizCargos as $Cargo) {
                                    //Creacion de un select con todos los cargos registrados en la base de datos, se usa nada más su nombre de cargo y idcargo.
                                    echo '<option value=' . $Cargo->getIdCargo() . '>' . $Cargo->getNombreCargo() . '</option>';
                                    }
                                ?>
                            </select>
                        </div>  
                    </div>

                    <div class="container-in">
                        <label clas="label"><p>Vista Encargado:</p></label>
                        <?php
                            //===========================>
                            // esta parte se usa con el fin de que al momento de hacer la consulta,
                            //verifique cuando traga de la base de datos si esta vacio el nombre y el cargo
                            //en caso contrario se le asigna a las variables Empleado sin asignar y cargo sin asignar en caso de que el empleado no tenga un cargo asignado
                            $Encargado;
                            $objEmpleado2 = new Empleados($idempleado, '', '', '', '', '', '', '', '', '', '');
                            $objControlempleado2 = new ControlEmpleados($objEmpleado2);
                            $objControlempleado2->consultar();
                            $Encargado = $objEmpleado2->getNombre();


                            $objcargos2 = new Cargos($cargo, '');
                            $objControlCargo2 = new ControlCargos($objcargos2);
                            $objControlCargo2->consultar();
                            $cargo2 = $objcargos2->getNombreCargo();

                            if ((empty($Encargado))) {
                                //echo '<p> Junior </p>' && empty($Cargo);
                                $Encargado = 'Empleado sin Asignar';
                            }
                            if (empty($cargo2)) {
                                $cargo2 = 'Cargo sin Asignar';
                            }
                            // ==========================>FIN
                        ?>
                        <div class="input-content"> 
                            <input type="text" name="txtEmpleado1" id="nombres" class="text-box" maxlength="50" value="<?php echo'' . $Encargado . '' ?>" disabled="true" >
                        </div>  
                    </div>

                        <div class="container-in">
                            <label clas="label"><p>Visualización Cargo:</p></label>
                            <div class="input-content"> 
                                <input type="text" name="txtcargo1" id="nombres" class="text-box" maxlength="50" value=" <?php echo'' . $cargo2 . '' ?>" disabled="true" >
                            </div>
                        </div>
                        <div class="container-btn">
                        
                            <button type="submit" class="btn" name="accion" value="Crear" >Crear Datos Cargo Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Consultar">Consultar Datos Cargo Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Eliminar">Eliminar Cargo Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Actualizar">Actualizar Datos Cargo Empleado</button>
                        
                    </div>
                    
                </form>
        </main>
        <footer>
<?php include "../footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
