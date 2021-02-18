<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
        $err_name = '';
        $err_email = '';
        $name ='';
        $email = '';
        $message = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $error = 0;

            if (empty($name)) {
                $err_name = 'Your name is importatn to us';
                $error++;
            }

            if (empty($email)) {
                $err_email = 'Your email is important to us';
                $error++;
            }

            if ($error==0) {
                $result = $user->update_user($_GET['id']);
                if ($result) {
                    $message = 'Data updated succesfully';
                }
            }
        }

        if (isset($_GET['id'])) {
        	$row=$user->get_user_details($_GET['id']);
        }

     ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if ($message): ?>
                    <div class="alert alert-success alert-dismissible ">
                        <?= $message?>
                    </div>
                <?php endif ?>
                
            </div>
            <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name='name' value="<?= $row['name']; ?>">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                    
                </div>
                <span class="text-danger"><?= $err_name; ?></span>
                </div>
                <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name='email' value="<?= $row['email']; ?>">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <span class="text-danger"><?= $err_email; ?></span>
                </div>
                
                
                <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update">
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