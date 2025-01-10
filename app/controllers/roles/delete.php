<?php

include '../../../app/config.php';   

$id_rol = $_POST['id_rol'];

$sql_usuarios = "SELECT * FROM usuarios where estado = '1' and rol_id = '$id_rol'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;
foreach ($usuarios as $usuario){
    $contador = $contador + 1;

}
if ($contador>0){
  //echo "existe este rol";
    session_start();
        $_SESSION['mensaje'] = "Existe este rol en la base de datos, no se puede eliminar";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles");
}
else{
    echo "no existe este rol";
$sentencia=$pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");

    $sentencia->bindParam('id_rol', $id_rol);

   
        if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino el rol de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el rol en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles");
    }

}

/*sentencia =$pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");

    $sentencia->bindParam('id_rol', $id_rol);

    try {
        if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino el rol de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el rol en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles");
    }

    } catch (Exception $exception) {
        $_SESSION['mensaje'] = "Error no se puede eliminar este rol porque existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles");
    }
*/