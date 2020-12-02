<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../img/favicon.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</head>

<body>
    <script src="../js/head.js"></script>
    

    <div class="cont">
    <?php
    $correo = $_POST['correo'];
    $nom = $_POST['nom'];
    $negoci = $_POST['negocio'];
    $tipoPro = $_POST['tipoP'];
    $sex = $_POST['sexo'];
    $descr = $_POST['desc'];
    $ide = $_POST['id'];


    $conex = mysqli_connect("localhost:3306","root","","software");

    session_start();
    $_SESSION['idd'] = "---";
    $_SESSION['tipoxx'] = "---";


    if($conex){
        
        $insert = "INSERT INTO sistema VALUES ('$ide','$nom','$correo','$negoci','$tipoPro','$sex','$descr');";
        if($conex->query($insert) == true){
           
            ?>
            <div><img src="../img/ok.png" width="100" height="100" alt=""></div>
            <h1>Proyecto agregado con éxito.</h1>
            <h5>Puede visualizar los proyectos agregados en el siguiente botón</h5>
            <a href="/softBuild/php/project.php" class="btn btn-outline-primary">Proyectos</a>
            <?php
        }else{
            ?>
            <h1>Error al agregar proyecto.</h1>
            <h4>Error en la conexión de la base de datos o ya existe la persona registrada.</h4>
            <a href="../pages/contact.html" class="btn btn-outline-primary">Regresar</a>
            <?php
        }

    }

    ?>

    </div>
   <script src="../js/footerr.js"></script>
</body>

</html>