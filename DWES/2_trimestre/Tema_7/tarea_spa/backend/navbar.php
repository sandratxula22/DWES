<?php
session_start();
?>
<h3>Usuario: <?php echo $_SESSION['user']; ?></h3>
<p id="logoutButton"><a href="">Cerrar sesión</a></p>