<div class="topnav" id="myTopnav">
  <a class="navbar-brand" href="index.php">
    <img src="./img/logo_size.jpg" width="30" height="30" class="d-inline-block align-center" alt="">
    Mesa de Ayuda
  </a>
  <a href="index.php" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="integrantes.php">Integrantes</a>
  <a href="quienessomos.php">Quienes Somos</a>
    <?php
    session_start();
            if (empty($_SESSION)) {
                echo '<a href="./vista/VistaLogin.php">Iniciar Sesión</a>';
            } else {
                echo'<a href="./control/ControlLogout.php">Cerrar Sesión</a>';
                echo '<a href="./vista/VistaMisRequerimientos.php">Mis Requerimientos</a><';
            }
             if (!empty($_SESSION)) {
                        if ($_SESSION['ControlAdmin'] || $_SESSION['ControlJefeArea']) {
                echo' <a href="gestion.php">Gestiones Mesa de Ayuda</a> ';
            }
             }
            ?>
       <?php
        if (!empty($_SESSION)) {

            echo '<p style=" font-size: 25px;color:white;font-family:Comic Sans MS"  href="#">Bienvenido: '
            ?><?php if (!empty($_SESSION)) {
            echo'' . $_SESSION['nombre'];
        } ?><?php
        echo'</p>';
    }
        ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
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

<!-- <div class="menu-bnt">
  <i class="fas fa-bars"></i>
</div>
<div class="box-nav">
    <nav class="nav-main">
      <a href="./index.php"><img src="img/logo_size.jpg" class="logo-img"></a>
      <a class="logo-text" href="./index.php">MESA DE AYUDA</a>
          <?php
          // if (empty(!$_SESSION)){
          //     echo '<p><a href="#">Bienvenido: ';
          //     if (empty(!$_SESSION)){
          //       echo'' . $_SESSION['nombre'];
          //     }
          //     echo'</a></p>';
          // }?>
        <ul class="nav-menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="quienessomos.php">QUIENES SOMOS</a></li>
            <li><a href="integrantes.php">INTEGRANTES</a></li>
            <?php
            // if (empty($_SESSION)){
            //     echo '<li><a href="./Vista/VistaLogin.php">Iniciar Sesión</a></li>';
            // }else{
            //     echo '<li><a href="./control/ControlLogout.php">Cerrar Sesión</a></li>';
            //     echo '<li><a href="./vista/VistaMisRequerimientos.php">Mis Requerimientos</a></li>';
            // }
            // if ($_SESSION['ControlAdmin'] || $_SESSION['ControlJefeArea']){
            //     echo '<li><a href="gestion.php">Gestiones Mesa de Ayuda</a></li>';
            // }?>
        </ul>
    </nav>
</div> -->
