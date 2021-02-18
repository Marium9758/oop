<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
        $err_name = '';
        $err_email = '';
        $err_password = '';
        $err_repassword = '';
        $name ='';
        $email = '';
    
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $error = 0;
            if (empty($name)) {
                $err_name = 'Your name is importatn to us';
                $error++;
            }

            if (empty($email)) {
                $err_email = 'Your email is importatn to us';
                $error++;
            }

            if (empty($password)) {
                $err_password = 'You need a password to login in future';
                $error++;
            }

            if (empty($repassword)) {
                $err_repassword = 'Your re-password should not empty';
                $error++;
            }

            if ($password!=$repassword) {
                $err_repassword = 'Your password not matched';
                $error++;
            }

            if ($error==0) {
                include '../classes/User.php';
                $user = new user;
                $user->register_user($_POST);
            }


        }
     ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name='name' value="<?= $name; ?>">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                    
                </div>
                <span class="text-danger"><?= $err_name; ?></span>
                </div>
                <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name='email' value="<?= $email; ?>">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <span class="text-danger"><?= $err_email; ?></span>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name='password' value="">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                <span class="text-danger"><?= $err_password ?></span>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name='repassword'>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                <span class="text-danger"><?= $err_repassword ?></span>
                </div>
                <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Register">
                </div>
                <!-- /.col -->
                </div>
            </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>