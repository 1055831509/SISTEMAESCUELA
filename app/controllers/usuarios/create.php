<?php

include '../../../app/config.php';

$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password == $password_repeat) {
    // Hashear la contraseña
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Obtener la fecha y hora actual
    $fechaHora = date('Y-m-d H:i:s'); // Esto asigna la fecha y hora actuales
    
    // Preparar la consulta SQL
    $sentencia = $pdo->prepare('
        INSERT INTO usuarios (nombres, rol_id, email, password, fyh_creacion, estado)
        VALUES (:nombres, :rol_id, :email, :password, :fyh_creacion, :estado)
    ');



    // Vincular parámetros
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fechaHora); // Asignar fecha y hora actuales
    $sentencia->bindParam(':estado', $estado_de_registro);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se registró el usuario correctamente en la base de datos";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error al registrar el usuario en la base de datos";
            $_SESSION['icono'] = "error";
            ?><script>window.history.back();</script> <?php
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "El email de este usuario ya existe en la base de datos";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script> <?php
    }

} else {
    echo "Las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script> <?php
}
?>
