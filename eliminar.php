<?php
include_once 'app.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM cam_tienda_tabla WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
// para cerra la conexion de la bdd 
$pdo = null;
$sentencia_eliminar = null;
header('location:index.php'); 
?>