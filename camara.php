<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Activar Camara</title>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="scripts.js"></script>

<header></header>

<main>

<div>
    <button type="button" id="mostrar" class="btn btn-primary">Activar  Camara</button> 
    <button type="button" id="cerrar" class="btn btn-danger">Cerrar Camara</button> <br><br>

    <video src="" id="video" ></video><br>

    <form action="guardar.php" method="post">
   
    <input type="text" name="caja" id="caja" value="" style="display: none;"><br>
    <p id="estado"></p>
    <button type="submit" id="capturar" class="btn btn-success">Tomar foto</button><br><br>
    
    </form>
    <canvas id="canvas" ></canvas>
</div>
    


</main>

<footer></footer>

</body>
</html>