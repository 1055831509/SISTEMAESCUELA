<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'Datos recibidos:';
    var_dump($_POST);
} else {
    echo 'Por favor, envía el formulario.';
}
?>
