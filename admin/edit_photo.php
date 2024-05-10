<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

    if (empty($_GET['id'])) {
     
        redirect("photos.php");    

    }else{

    $photo = Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {
        
    if ($photo) {
 
       $photo->title          = $_POST['title'];
       $photo->caption        = $_POST['caption'];
       $photo->alternate_text = $_POST['alternate_text'];
       $photo->description    = $_POST['description'];
   

   if (empty($_FILES['update_img'])) {
       
       $photo->save();
       redirect("photos.php");

   }else{
 
       $photo->set_file($_FILES['update_img']);
       $photo->img_save();
       $photo->save();
       redirect("photos.php");
       $session->message("The user has been updated.");

   
   }
  }
 }
}







 ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include("includes/top_nav.php"); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

             <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                            <small><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?> </small>
                        </h1>

                     <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8 col-md-12">
                     <a href="" style=""><img src="<?php echo $photo->picture_path(); ?>" class="thumbnail img-responsive img-fluid col-md-offset-3" alt="" style="width: 50%; border-radius: 10px;"></a>
                      <div class="form-group">
                         <input type="file" class="col-md-offset-5" name="update_img">
                     </div>   
                     <div class="form-group">
                         <label for="">Title</label>
                         <input type="text" class="form-control" name="title" value="<?php echo $photo->title; ?>">
                     </div>
                    <div class="form-group">
                         <label for="caption">Caption</label>
                         <input type="text" class="form-control" name="caption" value="<?php echo $photo->caption; ?>">
                     </div>
                    <div class="form-group">
                         <label for="alternate-text">Alternate Text</label>
                         <input type="text" class="form-control" name="alternate_text" value="<?php echo $photo->alternate_text; ?>">
                     </div>
                    <div class="form-group">
                         <label for="description">Description</label>
                         <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                     </div>      
                </div>

                    <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> <?php echo $photo->date; ?>
                                  </p>
                                  <p class="text ">
                                    Post Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data"><?php echo $photo->filename; ?></span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data"><?php echo $photo->type; ?></span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data"><?php echo $photo->size; ?></span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->

   </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>