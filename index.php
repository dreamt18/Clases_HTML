<?php
 
include_once 'app.php';
// Lee los elementos de la tabla 
$sql_leer = 'SELECT * FROM `cam_tienda_tabla`';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();                    
            //var_dump($resultado); devolvernos el array

if($_POST){
    $ropa = $_POST['ropa'];
    $zapatos = $_POST['zapatos'];
    $sql_insertar = 'INSERT INTO cam_tienda_tabla (ropa,zapatos) VALUES (?,?)';
    $sentencia_insertar = $pdo->prepare($sql_insertar);
    $sentencia_insertar->execute(array($ropa,$zapatos));
   //cerrar conexion a bdd
    $sentencia_insertar = null;
    $pdo = null;
    
    header('location:index.php');
}

if($_GET){
$id = $_GET['id'];
$sql_exclusivo = 'SELECT * FROM `cam_tienda_tabla` WHERE id=?';
$gsent_exclusivo = $pdo->prepare($sql_exclusivo);
$gsent_exclusivo->execute(array($id));
$resultado_exclusivo = $gsent_exclusivo->fetch();
            //var_dump($resultado_exclusivo);
}
?>
<!-- Pagina de boostsrap  -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/style.css">
    <title>Tienda de ropa exclusiva</title>
  </head>
  <body>
    <h1> Tienda Exclusiva </h1>
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">

                <?php foreach($resultado as $dato): ?>

                <div class="alert alert-dark" role="alert">
                    <?php echo $dato['ropa'] ?>
                    <?php echo $dato['zapatos'] ?>

                    <a href="eliminar.php?id=<?php echo $dato['id'] ?>" class="float-right ml-3">
                    <i class="fas fa-trash-alt"></i>
                    </a>

                    <a href="index.php?id=<?php echo $dato['id'] ?>" class="float-right">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>

                <?php endforeach ?>

        </div>

        <div class="col-md-6">
<!--Enviando el cliente-->
            <?php if(!$_GET): ?>
            <h2>Introduce su vestimenta</h2>
            <form method="POST">
                <input type="text" class="form-control" name="ropa">  
                <input type="text" class="form-control mt-3" name="zapatos">
                <button class= "btn-submit">Agregar</button> 
        </form>
        <?php endif ?>

        <?php if($_GET): ?>
            <h2 >Edite su vestimenta</h2>
            <form method="GET" action="editar.php">
                <input type="text" class="form-control" name="ropa" value="<?php echo $resultado_exclusivo['ropa'] ?>">
                <input type="text" class="form-control mt-3" name="zapatos" value="<?php echo $resultado_exclusivo['zapatos'] ?>">
                <input type="hidden" name="id" value="<?php echo $resultado_exclusivo['id'] ?>" >                
                <button class="btn-submit2">Agregar</button> 
        </form>
        <?php endif ?>


        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<?php
//cierre de bdd y todas las sentencias
$pdo = null;
$gsent = null;