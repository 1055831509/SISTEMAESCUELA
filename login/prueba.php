<?php
$password = "12345678"; // Cambia esto por la contraseña que quieras
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo $hashedPassword; // Este es el valor que deberías almacenar en la base de datos
?>

