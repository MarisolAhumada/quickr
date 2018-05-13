<?php 
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');

/*sql = "SELECT * FROM tbl_users"; 
$result = mysqli_query($DBcon,$sql); 
$sql = "SELECT * FROM inventario"; 
$result = mysqli_query($DBcon,$sql); 
*/?>



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Inicio</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        <div class="card-group">
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-table"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count">Inventario</span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold"><a href="inventario.php" >Ver Inventario</a></small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count">Categorias</span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold"><a href="categorias.php" >Ver Categorias</a></small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count">Productos</span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold"><a href="nuevo-item.php" >Agregar Nuevo</a></small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count">Eshop</span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold"><a href="../eshop" >Visitar Eshop</a></small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>


                        </div>
                    </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->





