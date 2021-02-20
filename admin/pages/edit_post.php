<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add new post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add new post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
        $err_title = '';
        $err_body = '';
        $title ='';
        $body = '';
        $message = '';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $error = 0;

            if (empty($title)) {
                $err_title = 'Title is important';
                $error++;
            }

            if (empty($body)) {
                $err_body = 'Please write somthing';
                $error++;
            }

            if ($error==0) {
               $result = $post->update_post($_POST);
               if ($result) {
                   $message = 'Post updated successfully';
               }
            }
        }
        $row = $post->get_post_details($_GET['id'])
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
            <div class="col-md-8">
            <form action="" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name='title' value="<?= $row['title']; ?>">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                    
                </div>
                <span class="text-danger"><?= $err_title; ?></span>
                </div>
                <div class="card-body pad">
                  <div class="mb-3">
                    <textarea name="body" class="textarea" 
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?= $row['body'];?></textarea>
                  </div>
                  <span class="text-danger"><?= $err_body; ?></span>
                </div>

                <div class="row">
                <input type="hidden" name="author_id" value="<?= $_SESSION['id'];?>">
                <input type="hidden" name="id" value="<?= $row['id'];?>">
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