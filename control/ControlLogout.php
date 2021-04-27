<?php
session_start();
unset($_SESSION['idempleado']);
unset($_SESSION['nombre']);
unset($_SESSION['foto']);
unset($_SESSION['hojavida']);
unset($_SESSION['telefono']);
unset($_SESSION['email']);
unset($_SESSION['direccion']);
unset($_SESSION['x']);
unset($_SESSION['y']);
unset($_SESSION['fkemplejefe']);
unset($_SESSION['fkarea']);
session_destroy();
echo '<script>alert("Irás a la página de inicio")</script>';
echo"<script> window.location='../index.php';</script>";
exit;
?>

?>