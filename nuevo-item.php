<?php 
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');
include ('db/dbcon.php');
$titulo = "Agregar elemento";

$sql = "SELECT * FROM subcategorias"; 
$result = mysqli_query($DBcon,$sql); 

$sql = "SELECT * FROM categorias"; 
$result1 = mysqli_query($DBcon,$sql); 

$sql = "SELECT * FROM unidades"; 
$result2 = mysqli_query($DBcon,$sql); 

if(isset($_POST['guardar'])) {
  $nombre = strip_tags($_POST['nombre']);
  $desc = strip_tags($_POST['desc']);
  $categoria = strip_tags($_POST['categoria']);
  $subcategoria = strip_tags($_POST['subcategoria']);
  $unidad = strip_tags($_POST['unidad']);
  $precio = strip_tags($_POST['precio']);
  $cantidad = strip_tags($_POST['cantidad']);
  $imagen = strip_tags($_POST['imagen']);

  $nombre = $DBcon->real_escape_string($nombre);
  $desc = $DBcon->real_escape_string($desc);
  $categoria = $DBcon->real_escape_string($categoria);
  $subcategoria = $DBcon->real_escape_string($subcategoria);
  $unidad = $DBcon->real_escape_string($unidad);
  $precio = $DBcon->real_escape_string($precio);
  $cantidad = $DBcon->real_escape_string($cantidad);

  $query = "INSERT INTO inventario(nombre,descripcion,categoria,subcategoria,unidad,precio,cantidad,imagen) VALUES('$nombre','$desc','$categoria','$subcategoria','$unidad','$precio','$cantidad','$imagen')";
  if ($DBcon->query($query)) {
    $msg = "<div class='alert alert-success'>
       <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Elemento guardado correctamente <a href=inventarios.php>  Ver inventario</a>.
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
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Agregar nuevo</strong> Elemento
                      </div>
                      <div class="card-body card-block">

                      <?php
                      if (isset($msg)) {
                      echo $msg;
                      }
                      ?>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="guardar" name="guardar">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"min="3" maxlength="20" required>Nombre</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control" min="3" maxlength="20" required><small class="form-text text-muted">Introduce el nombre del elemento</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descripcion</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="desc" name="desc" placeholder="descripcion" class="form-control"  maxlength="50" required><small class="form-text text-muted">Introduce una breve descripcion</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Categoria</label></div>
                            <div class="col-12 col-md-9">
                              <select name="categoria" id="categoria" class="form-control">
                              <?php 
                               while($row = mysqli_fetch_array($result1)){
                                $id = $row['id'];
                                $nombre = $row['nombre']; 
                                echo '<option value="'.$id.'">'.$nombre.'</option>';
                               }
                              ?>
                              </select>                          
                            <small class="form-text text-muted">Agregar nueva categoria</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Subcategoria</label></div>
                            <div class="col-12 col-md-9">
                              <select name="subcategoria" id="subcategoria" class="form-control">
                              <?php 
                               while($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $nombre = $row['nombre']; 
                                echo '<option value="'.$id.'">'.$nombre.'</option>';
                               }
                              ?>
                              </select>                          
                            <small class="form-text text-muted">Agregar nueva unidad</small></div>
                          </div> 
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Unidad de medida</label></div>
                            <div class="col-12 col-md-9">
                              <select name="unidad" id="unidad" class="form-control">
                              <?php 
                               while($row = mysqli_fetch_array($result2)){
                                $id = $row['id'];
                                $nombre = $row['nombre']; 
                                echo '<option value="'.$id.'">'.$nombre.'</option>';
                               }
                              ?>
                              </select>                          
                            <small class="form-text text-muted">Agregar nueva unidad</small></div>
                          </div>                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Precio</label></div>
                            <div class="col-12 col-md-9"><input type="number" min="0.01" max="9999999" step="0.01" id="precio" name="precio" placeholder="precio" class="form-control" required><small class="form-text text-muted">Introduce el precio de venta</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cantidad</label></div>
                            <div class="col-12 col-md-9"><input type="number" min="0" max="9999999" step="1" id="cantidad" name="cantidad" placeholder="cantidad" class="form-control" required><small class="form-text text-muted">Introduce la cantidad en stock</small></div>
                          </div>     
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Url de imagen</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="imagen" name="imagen" placeholder="http://" class="form-control"><small class="form-text text-muted">Introduce el link a la imagen</small></div>
                          </div>                          
                        
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" name="guardar" id="guardar">
                          <i class="fa fa-dot-circle-o"></i> Agregar
                        </button>
                    </form>
                      </div>
                    </div>
                    