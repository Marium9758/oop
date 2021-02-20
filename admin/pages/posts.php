<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">all post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
        $message= '';
        if (isset($_GET['status']) and $_GET['status']=='delete') {
            $result = $post->delete_post($_GET['id']);
            if ($result) {
                $message = 'Post deleted';
            }
         } 
        $result = $post->get_all_posts();
        
     ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?= $message; ?>
                </div>
            </div>
            <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">All posts</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table class="table table-bordered">
                              <thead>                  
                                <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Title</th>
                                  <th>Body</th>
                                  <th >Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 

                                  if ($result) :
                                    while ($row = mysqli_fetch_assoc($result)):?>
                                        <tr>
                                          <td><?= $row['id']; ?></td>
                                          <td><?= $row['title']; ?></td>
                                          <td>
                                            <?= substr($row['body'],0,100); ?>
                                          </td>
                                          
                                          <td><a class="btn btn-warning" href="edit_post.php?id=<?=$row['id']?>">edit</a> <a class="btn btn-danger" href="?status=delete&id=<?=$row['id']?>">delete</a></td>
                                        </tr>
                                    <?php  endwhile; ?>

                                <?php endif; ?>
                                
                                
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                              <li class="page-item"><a class="page-link" href="#">«</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.card -->

                        
                        <!-- /.card -->
                      </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>