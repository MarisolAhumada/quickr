<?php 
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');
include ('db/dbcon.php');
$titulo = "Inventarios";
$sql = "SELECT * FROM inventario"; //inventario en general
$result = mysqli_query($DBcon,$sql); //inventario en general

$sql1 = "SELECT * FROM inventario where cantidad = 0"; //por agotar
$result1 = mysqli_query($DBcon,$sql1); //por agotar

$sql2 = "SELECT * FROM inventario"; //nuevos elementos
$result2 = mysqli_query($DBcon,$sql2); //nuevos elementos

if(isset($_POST['eliminar'])) {
    $id = strip_tags($_POST['id']);
    $query = "DELETE FROM inventario WHERE id = $id";
    if ($DBcon->query($query)) {
      $msg_eliminar = "<div class='alert alert-success'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Elemento eliminado correctamente <a href=inventarios.php>  Actualizar</a>.
        </div>";
     }else {
      $msg_eliminar = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Ocurrio un error, vuelva a intentarlo.  
        </div>";
     }
} 
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
                            <strong class="card-title">Inventario en general</strong>
                        </div>
                        <div class="card-body">
                        <?php
                            if (isset($msg_eliminar)) {
                            echo $msg_eliminar;
                            }
                            ?>
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Categoria</th>
                                  <th scope="col">Unidad</th>
                                  <th scope="col">Precio</th>
                                  <th scope="col">Cantidad</th>
                                  <th scope="col" colspan="2">Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['id'];

                                    echo "
                                    <form method='post' name='eliminar'>
                                        <tr>
                                        <td><input type='text' id=nombre' name='id' placeholder='id' value='".$row['id']."' readonly> </td>
                                        <td>".$row['nombre']."</td>
                                        <td>".$row['descripcion']."</td>
                                        <td>".$row['categoria']."</td>
                                        <td>".$row['unidad']."</td>
                                        <td>".$row['precio']."</td>
                                        <td>".$row['cantidad']."</td>
                                    ";
                                    echo"<td><a href='modificar-item.php?id=$id' class='btn btn-info' role='button' ><center>Modificar</center></a></td>";
                                    echo"
                                    <td><button type='submit' class='btn btn-danger' name='eliminar'>
                                    <i class='fa fa-dot-circle-o'></i> Eliminar
                                    </button></form><td>";
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
                            <strong class="card-title">Elementos agotados</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Categoria</th>
                                  <th scope="col">Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                    while($row = mysqli_fetch_array($result1)){
                                    echo "

                                    <form method='post' name='eliminar'>
                                    <tr>
                                    <td><input type='text' id=nombre' name='id' placeholder='id' value='".$row['id']."' readonly> </td>
                                        <td>".$row['nombre']."</td>
                                        <td>".$row['descripcion']."</td>
                                        <td>".$row['categoria']."</td>
                                    ";
                                    echo"<td><a href='modificar-item.php?id=$id' class='btn btn-info' role='button' ><center>Modificar</center></a></td>";
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
                            <strong class="card-title">Elementos recientes</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Categoria</th>
                                  <th scope="col">Cantidad</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                    while($row = mysqli_fetch_array($result2)){
                                    echo "

                                        <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['nombre']."</td>
                                        <td>".$row['descripcion']."</td>
                                        <td>".$row['categoria']."</td>
                                        <td>".$row['cantidad']."</td>
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