<?php
include ('public/header.php');
include ('public/sidebar.php');
include ('public/top.php');
include ('public/footer.php');
include ('db/dbcon.php');
require_once 'db/dbcon.php';
$titulo = "Mi cuenta";

$id = $_SESSION['userSession'];

$sql = "SELECT * FROM tbl_users WHERE user_id = $id"; 
$result = mysqli_query($DBcon,$sql); 


if(isset($_POST['btn-signup'])) {
 $uname = strip_tags($_POST['username']);
 $upass = strip_tags($_POST['password']);
 $uname = $DBcon->real_escape_string($uname);
 $upass = $DBcon->real_escape_string($upass);
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
    $query = "UPDATE tbl_users SET username = '$uname', password = '$upass' WHERE user_id = $id";
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
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><?php echo"$id"; ?></strong>
                        </div>
                        <div class="card-body">

                    <h2 class="form-signin-heading">ACTUALIZAR DATOS DE ACCESO</h2><hr />

                    <?php
                    if (isset($msg)) {
                    echo $msg;
                    }
                    while($row = mysqli_fetch_array($result)){
                        $nombre = $row['username'];
                        }
                        
                    ?>

                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="nombre" name="username" value = "<?php echo"$nombre ";?>" required  />
                    </div>

                    <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password"  required  />
                    </div>

                    <hr />

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="btn-signup">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Actualizar
                    </button>

                        <div class="register-link m-t-15 text-center">
                            
                        </div>
                    </div>

                    </form>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
