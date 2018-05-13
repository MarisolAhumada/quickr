<?php 
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');
$titulo = "Unidades de medida";
include ('db/dbcon.php');
$sql = "SELECT * FROM unidades"; 
$result = mysqli_query($DBcon,$sql); 

if(isset($_POST['guardar'])) {
    $nombre = strip_tags($_POST['nombre']);
    $nombre = $DBcon->real_escape_string($nombre);
    $query = "INSERT INTO unidades(nombre) VALUES('$nombre')";
    if ($DBcon->query($query)) {
      $msg = "<div class='alert alert-success'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Elemento guardado correctamente <a href=unidades.php>  Actualizar</a>.
        </div>";
     }else {
      $msg = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Ocurrio un error, vuelva a intentarlo.  
        </div>";
     }
    }
    if(isset($_POST['eliminar'])) {
        $id = strip_tags($_POST['id']);
        $query = "DELETE FROM unidades WHERE id = $id";
        if ($DBcon->query($query)) {
          $msg_eliminar = "<div class='alert alert-success'>
             <span class='glyphicon glyphicon-info-sign'></span> &nbsp; subcategoria eliminada correctamente <a href=unidades.php>  Actualizar</a>.
            </div>";
         }else {
          $msg_eliminar = "<div class='alert alert-danger'>
             <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Ocurrio un error, vuelva a intentarlo.  
            </div>";
         }
    }  
    $DBcon->close();
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $titulo ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><?php echo $titulo ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Unidades</strong>
                        </div>
                        <div class="card-body">
                        <?php
                            if (isset($msg_eliminar)) {
                            echo $msg_eliminar;
                            }
                            ?>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                    while($row = mysqli_fetch_array($result)){
                                    echo "

                                        <form method='post' name='eliminar'>
                                        <tr>
                                        <td><input type='text' id=nombre' name='id' placeholder='id' value='".$row['id']."' readonly> </td>
                                        <td>".$row['nombre']."</td>
                                    ";
                                    echo"
                                    <td><button type='submit' class='btn btn-danger' name='eliminar'>
                                    <i class='fa fa-dot-circle-o'></i> Eliminar
                                    </button></form><td>
                                    ";
                                    echo"</td>
                                    </tr>";
                                    }
                                ?>
                      </tbody>
                  </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Agregar categoria</strong>
                        </div>
                        <div class="card-body">
                        <?php
                            if (isset($msg)) {
                            echo $msg;
                            }
                            ?>
                            <form action="" method="post" name="guardar" id="guardar" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control"><small class="form-text text-muted" min="3" maxlength="20" required>Introduce el nombre del elemento</small></div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" name="guardar" id= "guardar"  class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Agregar
                            </button>
                        </div>                            
                        </div>
                            </form>
                        </div>

                    </div>
                </div>