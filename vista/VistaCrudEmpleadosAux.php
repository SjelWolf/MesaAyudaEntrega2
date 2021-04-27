<!DOCTYPE html>
<?php
session_start();
//inclusion de Algunas clases de Control y Modelo para la creacion de objetos especificos para usar sus diferentes metodos.
include '../control/ControlConexion.php';
include '../control/ControlEmpleados.php';
include '../modelo/Empleados.php';
include '../modelo/CargoEmpleados.php';
include '../modelo/Areas.php';
include '../control/ControlAreas.php';
include '../control/ControlCargoEmpleados.php';
//===========================> FIN INCLUSION DE MODELOS Y CONTROLES
//=============================================> Inclusion de modelo de area y control de area
$objareas = new Areas('', '', '');

$objControlAreas = new ControlAreas($objareas);
$MatrizAreas = $objControlAreas->listar(); ///////Se crea una matriz llena de objetos de tipo area
//=============================================>Fin Inclusion de Area y Control Area
//=============================================>inclusion de modelo de empleado y control de empleado
$objEmpleados = new Empleados('', '', '', '', '', '', '', '', '', '', '');
$objControlEmpleados = new ControlEmpleados($objEmpleados);
$MatrizEmpleados = $objControlEmpleados->listar();
//=============================================> Fin inclusion de Empleados y Control de Empleados
//print_r($_POST);
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
//se guarda en una variable llamada accion el valor que se trae de los botones mediante el metodo POST
    echo '<h1> <center> <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" > La Opción que se ha elegido es:  ' . $accion . '</p></center></h1>';
//echo'<p style=" font-size: 45px;font-family:Britannic" ></p>';
} else {
    $accion = null;
}
//Se asigna los valores guardados en POSt a diferentes variables donde se van aguardar los datos que se usarán para operar los diferentes metodos de CRUD
$idEmpleado = isset($_POST['txtidempleado']) ? $_POST['txtidempleado'] : null;
$Nombre = isset($_POST['txtnombreEmpleado']) ? $_POST['txtnombreEmpleado'] : null;
$foto = 'C:\xampp\htdocs\proyectoMesaAyuda\vista\ft\3.pdf';
//isset($_POST['txtfoto']) ? $_POST['txtfoto'] :'C:\xampp\htdocs\proyectoMesaAyuda\vista\ft\3.pdf';
$hojavida = 'C:\xampp\htdocs\proyectoMesaAyuda\vista\hvs\3.pdf';
//isset($_POST['txthojavida']) ? $_POST['txthojavida'] : 
$telefono = isset($_POST['txttelefono']) ? $_POST['txttelefono'] : null;
$email = isset($_POST['txtemail']) ? $_POST['txtemail'] : null;
$direccion = isset($_POST['txtdireccion']) ? $_POST['txtdireccion'] : null;
$X = isset($_POST['txtX']) ? $_POST['txtX'] : null;
$Y = isset($_POST['txtY']) ? $_POST['txtY'] : null;
$fkEmple_Jefe = isset($_POST['txtEmpleadoEncargado']) ? $_POST['txtEmpleadoEncargado'] : null;
$fkArea = isset($_POST['txtarea']) ? $_POST['txtarea'] : null;

//print_r($_POST);

switch ($accion) {// declaración de una Estructura Switch para manejar las diferentes opciones
    case 'Crear':
        $objEmpleados = new Empleados($idEmpleado, $Nombre, $foto, $hojavida, $telefono, $email, $direccion, $X, $Y, $fkEmple_Jefe, $fkArea);
        //Se instancia la clase Empleado y se declara un objeto de tipo empleado y se crea un Empleado mediante el constructor
        $objControlEmpleado = new ControlEmpleados($objEmpleados); //se instancia la clase control Empleado y se crea un objeto de tipo control empleado
        $inserto = $objControlEmpleado->guardar(); //en la variable inserto se guarda el resultado del query, ya sea falso o verdadero y se usará para mostrar mensajes emergentes
        //que hablarán del estado del query
        if ($inserto) {
            echo '<script> alert("Registro Completado con éxito1")</script>';
            header('Refresh: 1; URL=VistaCrudEmpleadosAux.php'); //una vez completada la accion, esto recargará la pagina y se actualizará los registros que se estan mostrando en las tablas, los cuales se traen directamente 
            //de la base dedatos
        } else {
            echo '<script> alert("El registro no se pudo guardar; Ya existe; no debe repetirse o los campos estan vacios")</script>';
        }

        $accion = null;
        break;
    case'Consultar':

        if (isset($_POST['txtidempleado']) && $_POST['txtidempleado'] != '') { //esto se hace para que el metodo consultar se ejecute con un id de empleado, en caso contrario, se emitirira un mensaje donde avise que
            // //se necesita un codigo para realziar dicha operación
            //Creación de un Objeto de tipo empleado y otro de ControlEmpleado
            $objEmpleados = new Empleados($idEmpleado, '', '', '', '', '', '', '', '', '', '');
            $objControlEmpleados = new ControlEmpleados($objEmpleados);
            //$objControlEmpleados->consultar();//
            $ExisteRegistro = $objControlEmpleados->consultarAUX(); //metodo auxiliar que nos ayudará a saber si una consulta devuelve un recordset vacio o no vacio
            //--Uso Auxiliar------Fin
            if ($ExisteRegistro) {
                // Ejecucion de metodo consultar; creacion de ub objeto de tipo empleado y objeto control empleado, los cuales ayuaran a que se consulte los datos dentro de la BD
                $objEmpleados1 = new Empleados($idEmpleado, '', '', '', '', '', '', '', '', '', '');
                $objControlEmpleado1 = new ControlEmpleados($objEmpleados1);
                $MatrizEmpleado = $objControlEmpleado1->consultar();
                // session_start();//
                //mediante get se obtienen las variables que se mostraran al ejecutar la consulta

                $idEmpleado = $objEmpleados1->getIdEmpleado();
                $Nombre = $objEmpleados1->getNombre();
                $foto = $objEmpleados1->getFoto();
                $hojavida = $objEmpleados1->getHojaVida();
                $telefono = $objEmpleados1->getTelefono();
                $email = $objEmpleados1->getEmail();
                $direccion = $objEmpleados1->getDireccion();
                $X = $objEmpleados1->getX();
                $Y = $objEmpleados1->getY();
                $fkEmple_Jefe = $objEmpleados1->getFkEmple_Jefe();
                $fkArea = $objEmpleados1->getFkArea();
                //$_SESSION['Encargado'] = $objArea->getEmpleadoEncargado();
                //se le asigna el valor dentro de las sesiones a las variables que se usarán para mostrar el resultado en el formulario
                //$Encargado=$_SESSION['Encargado'];
                //session_destroy(); //se destruye la sesion
                echo'<script>alert("Registro EnContrado")</script>';
            } else { //mensajes de alerta
                echo'<script>alert("Empleado no encontrado")</script>';
            }
        } else {
            echo'<script>alert("Necesita el Codigo Para continuar la operación")</script>';
        }
        $accion = null;
        break;
    case 'Eliminar':
        if (isset($_POST['txtidempleado']) && $_POST['txtidempleado'] != '') {
            //Creacion e instanciacion de objetos empleado usando la clase empleados, la clase control empleado y uso de metodo auxiliar que verifica que el registro sí existe
            $objEmpleados = new Empleados($idEmpleado, '', '', '', '', '', '', '', '', '', '');
            $objControlEmpleados = new ControlEmpleados($objEmpleados);
            $CodigoAUX = 'Codigo Empleado: ' . $objEmpleados->getIdEmpleado() . ' Empleado Codigo: ' . $objEmpleados->getNombre();
            // $CodigoAUX = $objArea->getIdArea();
            $ExisteRegistro = $objControlEmpleados->consultarAUX();
            //echo $ExisteRegistro;
            if ($ExisteRegistro) {//Si el registro existe, Ejecuta el eliminar,
                //en caso contrario notifica que el registro no existe
                $objControlEmpleados->borrar();
                echo '<script> alert("Se ha Eliminado con Exito el Registro asociado al codigo: ' . $CodigoAUX . ' Recuerde Refrescar la pagina para ver la actualización de la Base de Datos")</script>';
                echo '<script> alert("La página Web Se actualizará automaticamente ")</script>';
                header('Refresh: 1; URL=VistaCrudEmpleadosAux.php');  //una vez completada la accion, esto recargará la pagina y se actualizará los registros que se estan mostrando en las tablas, los cuales se traen directamente 
                //de la base dedatos
            } else {
                echo '<script> alert("El registro Asociado Al codigo : ' . $CodigoAUX . ' No Existe. \n Vuelva a Intentar con Otro Codigo \n Recuerde no Dejar El Codigo Vacío ")</script>';
            }
        } else {
            echo'<script>alert("Necesita el Codigo Para continuar la operación")</script>';
        }
        $accion = null;

        break;
    case 'Actualizar':
        //Creacion e instanciacion de objetos empleado usando la clase empleado, la clase control empleados y uso de metodo auxiliar que verifica que el registro sí existe
        if (isset($_POST['txtidempleado']) && $_POST['txtidempleado'] != '') {
            $objEmpleados = new Empleados($idEmpleado, $Nombre, $foto, $hojavida, $telefono, $email, $direccion, $X, $Y, $fkEmple_Jefe, $fkArea);
            $objControlEmpleados = new ControlEmpleados($objEmpleados);
            $CodigoAUX = 'Codigo Empleado: ' . $objEmpleados->getIdEmpleado() . ' Empleado Codigo: ' . $objEmpleados->getNombre();
            // $CodigoAUX = $objArea->getIdArea();
            $ExisteRegistro = $objControlEmpleados->consultarAUX();
            if ($ExisteRegistro) {
                //el registro existe, Ejecuta el actualizar,
                //en caso contrario notifica que el registro no existe

                $objControlEmpleados->modificar();
                echo '<script> alert("El regstro asociado al codigo: ' . $CodigoAUX . ' Ha sido modificado con éxito Recuerde Refrescar la pagina para ver la actualización de la Base de Datos")</script>';
                echo '<script> alert("La página Web Se actualizará automaticamente ")</script>';
                header('Refresh: 1; URL=VistaCrudEmpleadosAux.php');
            } else {
                echo '<script> alert("El regstro asociado al codigo: ' . $CodigoAUX . ' No ha podio modificarse. Es posible que el registro asociado a dicho codigo no exista. \n INtente de nuevo")</script>';
            }
        } else {
            echo'<script>alert("Necesita el Codigo Para continuar la operación")</script>';
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
        <link rel="stylesheet" href="../css/vistaEmpleados.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C.R.U.D De Empleados</title>
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
       
       echo '<p><a style=" font-size: 25px;color:white;font-family:Comic Sans MS"  href="#">Bienvenido: '?><?php  if(empty(!$_SESSION)){echo''.$_SESSION['nombre'];} ?><?php echo'</a></p>';
       
   }
        ?>
</div>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
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
                <h1>CRUD De Empleados</h1>
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <br>
                                <div class="col-sm-8">
                                    <h2> Para Eliminar un Registro, ingrese el código del empleado que desea eliminar</h2> <br>
                                    <h2> Para consultar un empleado, ingrese su respectivo codigo
                                                Para modificar, lo primero que debe hacer es consultar por codigo el usuario y despues ingresar los nuevos datos</h2> 
                                            <br>
                                    <h2 style=" font-size: 2.5rem;" >Es obligatorio Asignar un área de Trabajo</h2>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                    <form action="VistaCrudEmpleadosAux.php" method="POST">

                        <div class="row">
                            <div class="col-md-6">
                                <label><p>identificación Empleado</p></label>
                                <input type="text" name="txtidempleado" id="codigo" class='form-control' maxlength="10" value="<?php echo'' . $idEmpleado . '' ?>">
                            </div>

                            <div class="col-md-6">
                                <label><p>Nombre Empleado:</p></label>
                                <input type="text" name="txtnombreEmpleado" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $Nombre . '' ?>">
                            </div>
                            <div></div>
                            <div class="col-md-6">
                                <label><p>Agregar Foto:</p></label>
                                <input type="file" name="txtfoto" id="nombre" class='form-control'  accept=".jpg, .jpeg, .png">
                                <label><p>Detalle Foto:</p></label>
                                <input type="text" name="txtft" id="nombres" class='form-control' maxlength="50" value="<?php echo'' . $foto . '' ?>" disabled="true" >
                            </div>
                            <div class="col-md-6">
                                <label><p>Agregar Hoja de vida:</p></label>
                                <input type="file" name="txthojavida" id="nombre" class='form-control' accept=".jpg, .jpeg, .png, .pdf">
                                <label><p>Detalle Hoja vida:</p></label>
                                <input type="text" name="txthv" id="nombres" class='form-control' maxlength="50" value="<?php echo'' . $hojavida . '' ?>" disabled="true" >
                            </div>
                            <div class="col-md-6">
                                <label><p>Teléfono:</p></label>
                                <input type="text" name="txttelefono" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $telefono . '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label><p>Correo Electrónico:</p></label>
                                <input type="email" name="txtemail" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $email . '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label><p>Dirección:</p></label>
                                <input type="text" name="txtdireccion" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $direccion . '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label><p>Coordenada X:</p></label>
                                <input type="text" name="txtX" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $X . '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label><p>Coordenada Y:</p></label>
                                <input type="text" name="txtY" id="nombre" class='form-control' maxlength="50" value="<?php echo'' . $Y . '' ?>">
                            </div>

                            <div class="col-md-6">
                                <label><p>Empleado Encargado:</p></label>
                                <select name="txtEmpleadoEncargado" class="form-select form-select-lg mb-4"  aria-label=".form-select-lg example">
<?php
foreach ($MatrizEmpleados as $Empleados) {
    //Se usa la Matriz Empleados para construir un select mediante los datos directamente traidos desde la base de datos; para lograr esto, se usan los metodos get
    //Se usan nada más los codigos del empleado y su nombre
    ?>


                                        <?php
                                        echo '<option value=' . $Empleados->getIdEmpleado() . '>' . $Empleados->getNombre() . '</option>';
                                        ?>

                                        <?php }
                                    ?>
                                    <option value="NULL" selected="selected">Jefe Sin Asignar</option>
                                </select>

<!--<input type="text" name="txtnombrearea" id="nombre" class='form-control' maxlength="50">-->
                            </div>
                            <div class="col-md-6">
                                <label><p>Area a asignar:</p></label>
                                <select name="txtarea" class="form-select form-select-lg mb-4"  aria-label=".form-select-lg example">
<?php
foreach ($MatrizAreas as $Areas) {
    //Se usa la Matriz Areas para construir un select mediante los datos directamente traidos desde la base de datos; para lograr esto, se usan los metodos get
    //Se usan nada más los codigos del area y su nombre
    ?>


                                        <?php
                                        echo '<option value=' . $Areas->getIdArea() . '>' . $Areas->getNombre() . '</option>';
                                        ?>

                                        <?php }
                                    ?>
                                    <!-- <option value="NULL" selected="selected">Área sin Asignar</option> -->
                                </select>

                                    <?php
                                    //===========================>
                                    // esta parte se usa con el fin de que al momento de hacer la consulta,
                                    //verifique cuando traga de la base de datos si esta vacio el nombre y el cargo
                                    //en caso contrario se le asigna a las variables Empleado sin asignar y cargo sin asignar en caso de que el empleado no tenga un cargo asignado
                                    $Encargado;
                                    $objEmpleado2 = new Empleados($fkEmple_Jefe, '', '', '', '', '', '', '', '', '', '');
                                    $objControlempleado2 = new ControlEmpleados($objEmpleado2);
                                    $objControlempleado2->consultar();
                                    $jefe = $objEmpleado2->getNombre();


                                    $objareas3 = new Areas($fkArea, '', '');
                                    $objControlAreas3 = new ControlAreas($objareas3);
                                    $objControlAreas3->consultar();
                                    $NombreArea = $objareas3->getNombre();

                                    if ((empty($jefe))) {
                                        //echo '<p> Junior </p>' && empty($Cargo);
                                        $Encargado = 'Empleado sin Asignar';
                                    }
                                    if (empty($NombreArea)) {
                                        $cargo2 = 'Area sin Asignar';
                                    }
                                    // ==========================>FIN
                                    ?>
                                <label><p>Detalle Area</p></label>
                                <input type="text" name="txtjf" id="nombres" class='form-control' maxlength="50" value="<?php echo'' . $NombreArea . '' ?>" disabled="true" >
                               <!--<input type="text" name="txtnombrearea" id="nombre" class='form-control' maxlength="50">-->
                            </div>
                            <div class="col-md-6">
                                <label><p>Detalle Jefe</p></label>
                                <input type="text" name="txtjf" id="nombres" class='form-control' maxlength="50" value="<?php echo'' . $jefe . '' ?>" disabled="true" >
                               <!--<input type="text" name="txtnombrearea" id="nombre" class='form-control' maxlength="50">-->
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="container-btn">
                            <button type="submit" class="btn" name="accion" value="Crear" >Crear Datos Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Consultar">Consultar Datos Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Eliminar">Eliminar Empleado</button>
                            <button type="submit" class="btn" name="accion" value="Actualizar">Actualizar Datos Empleado</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
        <footer>
<?php include "../footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
