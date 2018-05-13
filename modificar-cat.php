<?php 
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');
include ('db/dbcon.php');
$titulo = "Categorias";
$id = $_GET['id'];
$sql = "SELECT * FROM categorias WHERE id = $id"; 
$result = mysqli_query($DBcon,$sql); 

if(isset($_POST['guardar'])) {
    $nombre = strip_tags($_POST['nombre']);
    $desc = strip_tags($_POST['desc']);
    $nombre = $DBcon->real_escape_string($nombre);
    $desc = $DBcon->real_escape_string($desc);
    $query = "UPDATE categorias SET nombre = '$nombre', descripcion = '$desc' WHERE id = $id";
    if ($DBcon->query($query)) {
      $msg = "<div class='alert alert-success'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Elemento guardado correctamente <a href=categorias.php>  ver categorias</a>.
        </div>";
     }else {
      $msg = "<div class='alert alert-danger'>
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
                            $nombre = "";
                            $desc = "";

                           while($row = mysqli_fetch_array($result)){
                            $nombre = $row['nombre'];
                            $desc = $row['descripcion'];
                            }
                            ?>
                            <form action="" method="post" name="guardar" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nombre" name="nombre" placeholder="nombre" value = "<?php echo"$nombre ";?>" class="form-control" min="3" maxlength="20" required>><small class="form-text text-muted">Introduce el nombre del elemento</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descripcion</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="desc" name="desc" placeholder="descripcion" value = "<?php echo"$desc ";?>"  class="form-control" maxlength="100" required ><small class="form-text text-muted">Introduce una breve descripcion</small></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="guardar">
                            <i class="fa fa-dot-circle-o"></i> Agregar
                            </button>
                            </form>
                        </div>
                        <div class="card-footer">

                        </div>                            
                        </div>
                    </div>
                </div>
