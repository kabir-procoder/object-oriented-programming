
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?> </small>
                        </h1>

                        <?php 
                    
                        // $sql = "SELECT * FROM users";
                        // $result = $database->query($sql);

                        // $users = User::find_all();
                        // $row = mysqli_fetch_array($users);
                        // echo $row['username'] . "<br>";
                        

                        // $user = User::find_by_id(1);

                        // $display_user = User::instantation($user);
                        // echo $display_user->username;
                        // echo $display_user->password;
                        // echo $user->password; 
                       // echo  $user['lastname'];
                       
                        // $users = User::find_all();

                        // foreach ($users as $user) {
                            
                        //   echo $user->username;



                        // }
                  

                        // $users = User::find_all();

                        // foreach ($users as $user) {
                            
                        // echo $user->username . "<br>";
                            
                        // }

                        // $user_id = User::find_by_id(2);
                        
                        // echo $user_id->username;    

                  
                        // $pic = new Hello();
                        


                       

                        // echo $new_user->username;


                       
                        // $create_user = new User();
                        // $create_user->username = "Farhad";
                        // $create_user->password = "123";
                        // $create_user->firstname = "firstname";
                        // $create_user->lastname = "lastname";
                        // $create_user->save();
 
                        // $user = User::find_by_id(20);

                        // $user->username = "Mikky";
                        // $user->password = "123";
                        // $user->firstname = "firstname";
                        // $user->lastname = "lastname";
                        // $user->save();


                        // $user = User::find_by_id(52);

                        // $user->delete();

                        //  $photos = Photo::find_all();


                        // foreach ($photos as $photo) {  

                        // echo $photo->title;

                        // }
                        

                        // $photo = new Photo();
                        // $photo->title = "Farhad";
                        // $photo->description = "nice pic";
                        // $photo->filename = "images";
                        // $photo->type = "imege";
                        // // $photo->size = "size";
                        // $photo->save();

                       

                        // $photo = Photo::find_by_id(2);
                        // $photo->title = "Farhad Mikky";
                        // $photo->description = "nice pic";
                        // $photo->filename = "images";
                        // $photo->type = "imege";
                        // $photo->size = "1";
                        // $photo->save();


                        // $photo = Photo::find_by_id(7);

                        // $photo->delete();

                        // echo INCLUDES_PATH;

                         ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->