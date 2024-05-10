<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php $users = User::find_all(); ?>

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
                            users
                            <small><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?> </small>
                        </h1>

<p class="bg-success text-center"> <?php echo $session->message; ?></p>
                     <form action="" class="middle">
                         <a href="add_user.php" class="btn btn-primary">Add User</a>
                         <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>Image</th>
                                      <th>Username</th>
                                      <th>First Name</th>
                                      <th>Lastname</th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              <?php foreach ($users as $user): ?>

                                  <tr>
                                      <td class=""><?php echo $user->id; ?></td>
                                      <td class="img-responsive img-fluid" style="margin: 0px;"><img class="thumbnail" width="120" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" style="border-radius: 5px;">
                                      </td>
                                      <!-- <td>image</td> -->
                                      <td><?php echo $user->username; ?>
                                      <div class="update-link">
                                            <h5>
                                            <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                            <a href="delete_user.php?id=<?php echo $user->id; ?>" style="color: red;">Delete</a>
                                            </h5>
                                        </div> 
                                      </td>
                                      <td><?php echo $user->firstname; ?></td>
                                      <td><?php echo $user->lastname; ?></td>
                                      
                                      <!-- <td><a href="">Delete</a></td> -->
                                      
                                  </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table> 

                     </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>