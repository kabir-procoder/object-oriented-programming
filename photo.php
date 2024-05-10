<?php require_once("includes/header.php"); ?>

<?php 

require_once("admin/includes/init.php");

if (empty($_GET['id'])) {
    
    redirect("index.php");

}

$photo = Photo::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {
 
 $name    = trim($_POST['author']);
 $email   = trim($_POST['email']);
 $body    = trim($_POST['message']);
 

 $comment = Comment::create_comment($photo->id, $name, $email, $body);

 if ($comment && $comment->save()) {
   
   redirect("photo.php?id={$photo->id}"); 
   $session->message("Send your comment successfully.");

 }else{

   $message = "There was some problems saving";

 }



}else{
$message = "";
$name    = "";
$email   = "";
$body    = "";

 }


 $comments = Comment::find_the_comments($photo->id);


 ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Farhad</a>
                </p>

                <hr>

                <!-- Date/Time -->
               <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2023 at 9:00 PM</p> 

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>
             
             

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h5 class="text-center bg-info fw-bolder"><?php echo $session->message; echo $message; ?></h5>
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php foreach ($comments as $comment):?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $comment->author; ?>
                            <small>August 25, 2023 at 10:30 PM</small>
                        </h4>
                      <?php echo $comment->comment_body; ?>
                    </div>
                </div>

            <?php endforeach; ?>

                    </div>
                </div>

            </div>



        <hr>

        <!-- Footer -->
<!--         <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2023</p>
                </div>
            </div>
            
        </footer>

    </div> -->
    <!-- /.container -->

    <!-- jQuery -->


<?php include("includes/footer.php"); ?>
