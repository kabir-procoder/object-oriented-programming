<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

if (empty($_GET['id'])) {

redirect("users.php");

}

$user = User::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {


if ($user) {
 
    $user->username    = $_POST['username'];
    $user->password    = $_POST['password'];
    $user->firstname   = $_POST['firstname'];
    $user->lastname    = $_POST['lastname'];
    
if (empty($_FILES['user_image'])){

    $user->save();
    redirect("users.php");
    $session->message("The user has been updated.");
    
}else{
         
    $user->set_file($_FILES['user_image']);
    $user->user_img_save();
    $user->save();
    redirect("users.php");
    $session->message("The user has been updated.");
       
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
                    <div class="col-lg-12" style="margin-bottom: 100px;">
                        <h1 class="page-header text-center">
                            users
                            <small><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?> </small>
                        </h1>
                       
                     
                      <div class="col-md-6 user_image_box">

                        <a href="#" data-toggle="modal" data-target="#photo-library"><img src="<?php echo $user->image_path_and_placeholder(); ?>" width="100"  alt="" class="img-responsive" style="border-radius: 5px; width: 100%;"></a>

                      </div>  

                     <form action="" method="post" enctype="multipart/form-data" class="edit-user">
                    <div class="col-md-6 wow">
                     
                   <div class="form-group">
                     
                      <input type="file" name="user_image">
                      <!-- <input type="hidden" name="old_image" value="<?php// echo $user->user_image; ?>"> -->
                     </div> 
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input type="text" class="form-control"  name="username" value="<?php echo $user->username; ?>">
                     </div>
                    <div class="form-group">
                         <label for="firstname">First Name</label>
                         <input type="text" class="form-control" name="firstname" value="<?php echo $user->firstname; ?>">
                     </div>
                    <div class="form-group">
                         <label for="lastname">Last Name</label>
                         <input type="text" class="form-control" name="lastname" value="<?php echo $user->lastname; ?>">
                     </div>

                   <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password" value="<?php echo $user->password; ?>">
                     </div>

                    <div class="add-user">
                     <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">  

                      <a id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>" class="pull-left btn btn-danger">Delete</a>  

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