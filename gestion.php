<!DOCTYPE html>
<?php
//session_start();
?>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MesaAyuda</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="img/logo_size.jpg">
    </head>

    <body>
        <header>
        <?php include "header.php"?>
      </header>

        <main>
            <section>
                <?php
                if ($_SESSION['ControlAdmin']) {
                    echo'<section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para poder realizar la gestion de las Areas de la empresa</p>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >consultas, actualizacion, borrado, insercion</p>
                <a href="vista/VistaCrudAreasAux.php"><button type="button" onclick="location.href ="vista/VistaCrudAreasAux.php" class="btnAreas">Crud de Areas</button></a>
            </section>';
                    echo' <section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para poder realizar la gestion de los empleados de la empresa</p>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >consultas, actualizacion, borrado, insercion</p>
                <a href="vista/VistaCrudEmpleadosAux.php"><button type="button" onclick="location.href = "vista/VistaCrudEmpleadosAux.php" class="btnAreas">Crud de Empleados</button></a>
            </section>';
                     echo'<section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para poder realizar la gestion de los Cargos Por Empleado de la empresa</p>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >consultas, actualizacion, borrado, insercion</p>
                <a href="vista/VistaCrudCargosEmpleadosAux.php"><button type="button" onclick="location.href ="vista/VistaCrudCargosEmpleadosAux.php" class="btnAreas">Crud de cargos por Empleados</button></a>
            </section>';
        echo'<section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para poder realizar la gestion de los Cargos de la empresa</p>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >consultas, actualizacion, borrado, insercion</p>
                <a href="vista/VistaCrudCargosAux.php"><button type="button" onclick="location.href ="vista/VistaCrudCargosAux.php" class="btnAreas">Crud de Cargos</button></a>
            </section>';
                    
         echo'<section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para acceder a los informes y consultas</p>
                <a href="./vista/VistaConsultasInformes.php"><button type="button" onclick="location.href ="./vista/VistaConsultasInformes.php" class="btnAreas">Informes y Consultas</button></a>
            </section>';
                   /* echo' <a href="./vista/VistaCrudAreasAux.php">Gestion de Areas</a>';
                    echo' <a href="./vista/VistaCrudEmpleadosAux.php">Gestion de Empleados</a>';
                    echo' <a href="./vista/VistaCrudCargosAux.php">Gestion de Cargos</a>';
                    echo' <a href="./vista/VistaConsultasInformes.php">Administrar Usuarios</a>';
                    echo'<a href="./vista/VistaCrudCargosEmpleadosAux.php">Gestion de Cargos por Empleado</a>';
                    echo '<a href="./vista/VistaConsultasInformes.php">Consultas E informes</a>'; */
                    
                }
                if ($_SESSION['ControlJefeArea']) {
                 echo'<section>
                <p style=" font-size: 45px;color:white;font-family:Comic Sans MS" >Accede aqui para acceder a los informes y consultas</p>
                <a href="./vista/VistaConsultasInformes.php"><button type="button" onclick="location.href ="./vista/VistaConsultasInformes.php" class="btnAreas">Informes y Consultas</button></a>
            </section>';
                
            }
            ?>

        </main>

        <footer>
            <?php include "footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
