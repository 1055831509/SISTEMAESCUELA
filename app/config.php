<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemaescuela');

define('APP_NAME','SISTEMA DE GESTION ESCOLAR');
define('APP_URL','http://localhost/sistemaescuela');
define('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO(dsn: $servidor,username: USUARIO,password: PASSWORD,options: array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
    //echo "conexion exitosa a la base de datos";

}catch (PDOException $e) {
    echo "error";
}

// Establecer la zona horaria
date_default_timezone_set("America/Bogota");

// Obtener la fecha y hora actual en el formato Y-m-d H:i:s
$fechaHora = date('Y-m-d H:i:s');
// Obtener la fecha en diferentes formatos
$fecha_actual = date('Y-m-d');  // Fecha actual: año-mes-día
$dia_actual = date('d');         // Día actual (01 a 31)
$mes_actual = date('m');         // Mes actual (01 a 12)
$ano_actual = date('Y');         // Año actual (e.g., 2024)

$estado_de_registro = '1';