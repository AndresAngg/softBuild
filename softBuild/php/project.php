<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
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
    <div class="banner">
        <h1>Proyectos</h1>
    </div>
    <?php
      $conex = mysqli_connect("localhost:3306","root","","software");
    ?>
    <div class="cont">
        <form method="POST">
            <div class="form-row">
                <div class="col-md-4  mb-3">
                    
                    <select name="xtipo" class="form-control">
                                <option value="">Tipo de proyecto</option>
                                <option value="Administración Pública">Administración Pública</option>
                                <option value="Comercio y Distribución">Comercio y Distribución</option>
                                <option value="Educación">Educación</option>
                                <option value="Sanidad y Salud Pública">Sanidad y Salud Pública</option>
                                <option value="Finanzas y Seguros">Finanzas y Seguros</option>
                                <option value="Turismo y Ocio">Turismo y Ocio</option>
                                <option value="Ingenierías y Tecnonlógias">Ingenierías y Tecnonlógias</option>
                                <option value="Industria">Industria</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4  mb-3">
                    <input type="text" placeholder="Identificación" name="xid" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="submit" name="buscar" class="btn btn-outline-primary" value="Buscar">
                </div>
            </div>
        </form>
      <table class="table table-striped table-inverse table-responsive">
          <thead class="thead-inverse">
              <tr>
                  <th>Identificación</th>
                  <th class="w-25">Empleado</th>
                  <th >Correo</th>
                  <th >Nombre negocio</th>
                  <th class="w-25">Tipo de proyecto</th>
                  <th class="w-25">Descripción</th>
              </tr>
              </thead>
              <tbody>
                  <?php
                     $where="";
                     if(isset($_POST['buscar'])){
                       if(empty($_POST['xtipo'])){
                           $where = "where identi like '".$_POST['xid']."%'";
                       }
                       else if(empty($_POST['xid'])){
                           $where = "where Tipo like '".$_POST['xtipo']."%'";
                       }else{
                        $where = "where identi like '".$_POST['xid']."%' and Tipo like '".$_POST['xtipo']."%'";
                       }
                     }
                    if ($conex){
                        $consulta = "SELECT * FROM sistema $where";
                        $resultado = mysqli_query($conex,$consulta);
                        if($resultado){
                            while($row = $resultado->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $row['identi'] ?></td>
                                    <td><?php echo $row['Nombre'] ?></td>
                                    <td><?php echo $row['Correo'] ?></td>
                                    <td><?php echo $row['Negocio'] ?></td>
                                    <td><?php echo $row['Tipo'] ?></td>
                                    <td><?php echo $row['Descri'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                  ?>
              </tbody>
      </table>
    </div>
    <script class="mt-5" src="../js/footerr.js"></script>
</body>
</html>
