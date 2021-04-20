<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Balsamiq+Sans&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
    <title>Visual Recognition</title>
</head>
<body>
<?php

$apikey = "21f3ee9c6e364b45c032da3be04f9ce4";
$endpoint = "https://api.imgbb.com/1/upload?";

/* Aqui la imagen llega en base 64 pero con un tipo de formato no admitido 
para consumir el servicio.
'data:image/png;base64,' esto hay que quitarlo
*/
$base64img = $_POST["caja"];
// Quitamos los caracteres que no nos sirven para enviar en base 64 la imagen;
list(, $base64Img) = explode(';', $base64img);
list(, $base64Img) = explode(',', $base64img);

// Unimos la apikey y la imagen en una sola linea de codigo
// Usamos la funcion urlencode para que se pueda leer correctamente  nuestra imagen enviada
$post = "key=".$apikey."&image=".urlencode($base64Img);

$ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$endpoint);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

$resultado = curl_exec($ch);

$json = json_decode($resultado,true);

 $repositorImg= $json['data']['url'];
 
 echo "<h1>Imagen Guardada Satisfactoriamente en el repositorio y colocada en la url del formulario</h1>";



//$string = chunk_split($base64img, 64, "\n");
//$base64img = base64_decode($base64img);

//file_put_contents('unodepiera.png', $base64img);    
//$imagedata = file_get_contents('unodepiera.png');
//echo "<img src='unodepiera.png' alt='unodepiera' />";

?>

<header></header>
<main>
<h1>Reconocimiento de Imagenes</h1><br>
<form action="respuesta.php" method="post">
    <label for="caja">Ingresa la url de la imagen:</label><br>
    <input type="url" name="imagen" class="caja" id="caja1" value="<?php echo $repositorImg ?>" readonly="readonly" required><br><br>
    <label for="caja2">Ingresa la Api Key del servicio:</label><br>
    <input type="text" name="apikey" class="caja" id="caja1" required><br><br>
    <button type="submit" class="btn btn-success" id="boton">Enviar</button>
    </form>
</main>
<footer></footer>

</body>
</html>
