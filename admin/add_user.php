<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


$user = new User();

if (isset($_POST['submit'])) {


if ($user) {
 
   $user->username    = $_POST['username'];
   $user->password    = $_POST['password'];
   $user->firstname   = $_POST['firstname'];
   $user->lastname    = $_POST['lastname'];
   $user->set_file($_FILES['user_img_upload']);
   $user->user_img_save();
   // $session->message("The user {$user->username} has been added.");


       
    $session->message("The user {$user->username} has been added."); 
    $user->save();
    redirect("users.php");

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
                       
                     <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="col-lg-6 col-md-12 wow col-lg-offset-3">
                     
                   <div class="form-group"> 
                      <input type="file" name="user_img_upload">
                     </div> 
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input type="text" class="form-control" required  name="username" autocomplete="off">
                     </div>
                    <div class="form-group">
                         <label for="firstname">First Name</label>
                         <input type="text" class="form-control" name="firstname" autocomplete="off">
                     </div>
                    <div class="form-group">
                         <label for="lastname">Last Name</label>
                         <input type="text" class="form-control" name="lastname" autocomplete="off">
                     </div>

                   <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" required name="password" autocomplete="new-password">
                     </div>
                       
                     <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right">    

                         
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