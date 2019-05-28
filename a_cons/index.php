<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "UTF-8">
	<!--Tamaño de la pantalla-->
	<title>TropicalBar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/letras.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/slideshow.css">
	<title> TropicalBar</title>
</head>
<body>
	<header>
		
 
		<nav>
			<ul>
				<li><a href="./index.php">Inicio </a></li>
				<li><a href="./php/Quienes_somos.php">Quienes somos</a></li>
				<li><a href="./php/Telefonos.php">Telefonos</a></li>
				<li><a href="./php/Correos_electronicos.php">Correos electronicos</a></li>
				<li><a href="./php/Formulario.php" >Formulario</a></li>
			</ul>
		</nav>
		</header>
		<br>
    <h1>TropicalBar</h1>
            <h2>Incursiona en el Mundo de los Cocteles</h2>
    <div class="main">
        <div class="slides">
            <img src="./image/foto1.jpg" alt="">
            <img src="./image/foto2.jpg" alt="">
            <img src="./image/foto3.jpg" alt="">
          
        </div>
    </div>
    <! slides, automatico>
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/jquery.slides.js"></script>
    
    <script>
     $(function(){
        $(".slides").slidesjs({
    play: {
      active: true, //Genera los botones de play y stpo
        
      effect: "slide",// Puede ser  "slide" o"fade".
        
      interval: 3000,// Intervalo en milisegundos
        
      auto: false,// Puede cambiarse el estado a true y al abrir la pagina comienza automaticamente
        
      swap: true,// Muestra el boton de play y stop
        
      pauseOnHover: false,// [booleano] hace una pausa en una presentación de diapositivas en reproducción
        
      restartDelay: 2500, // [número] retraso de reinicio en la presentación inactiva
        
    }
  });
});
    </script>

              
</body>

</html>


