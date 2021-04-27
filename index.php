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
            <div class="container-main">
                <div class="container-video">
                    <h1 class="titulo-video">Tutoria | como manejar la Mesa de Ayuda</h1>
                   <iframe class="iframe" src="https://www.youtube.com/embed/vfZZzSukPKw?autoplay=1&mute=1" title="YouTube video player" 
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="menucrud">
                  <div class="col1">
                    <div class="vis">
                        <p>Accede aqui para poder realizar la gestion de las Areas de la empresa: consultas, actualizacion, borrado, insercion</p>
                        <a href="vista/VistaCrudAreasAux.php" class="btn">
                            Crud de Areas
                        </a>
                    </div>

                    <div class="vis">
                        <p>Accede aqui para poder realizar la gestion de los Cargos por Empleado de la empresa: consultas, actualizacion, borrado, insercion</p>
                        <a href="vista/VistaCrudEmpleadosAux.php" class="btn">
                            Crud de empleados
                        </a>
                    </div>

                    <div class="vis">
                        <p>Accede aqui para poder realizar un requerimiento o insidencia</p>
                        <a href="vista/VistaRadicacion.php" class="btn">
                            Realiza un Requerimiento
                        </a>
                    </div>
                  </div>
                  <div class="col2">
                    <div class="vis">
                        <p>Accede aqui para poder realizar la gestion de los cargos de los empleados de la empresa: consultas, actualizacion, borrado, insercion</p>
                        <a href="vista/VistaCrudCargosAux.php" class="btn">
                            Crud de Cargos
                        </a>
                    </div>

                    <div class="vis">
                        <p>Accede aqui para poder realizar la gestion de los cargos por empleados de la empresa: consultas, actualizacion, borrado, insercion</p>
                        <a href="vista/VistaCrudCargosEmpleadosAux.php" class="btn">
                            Crud de Cargos por Empleado
                        </a>
                    </div>
                  </div>
                </div>
            </div>
        </main>

        <footer>
          <?php include "footer.html" ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
