<?php
$link = 'mysql:host=localhost;dbname=cm_tienda_ropa_base_de_datos';
$usuario = 'root';
$contraseña = '';
try{
    $pdo = new PDO($link,$usuario,$contraseña); 
  
    
    //echo 'Conectado'; 
    //foreach($pdo->query('SELECT * FROM `cm_tienda_ropa_base_de_datos`') as $fila) {
    //   print_r($fila);
    //}
   
}catch (PDOException $e) {
   print "¡Error!: " . $e->getMessage() . "<br/>";
   die();
} 
?>