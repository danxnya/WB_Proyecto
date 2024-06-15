<?php
session_start();  // Reanudar la sesión existente
session_unset();  // Liberar todas las variables de sesión
session_destroy();  // Destruir la sesión

header('Location: /WB_Proyecto/html/index.html');  // Redirigir al usuario a la página de inicio de sesión
exit();
?>
