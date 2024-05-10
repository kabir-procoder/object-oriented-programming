<?php 



class Comment extends Db_object {

    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'email', 'comment_body');
    public $id;
    public $photo_id;
    public $author;
    public $email;
    public $comment_body;
    


    public static function create_comment($photo_id, $author="Kabir", $email="",  $comment_body=""){
        
      if (!empty($photo_id) && !empty($author) && !empty($email) && !empty($comment_body)) {

      $comment = new Comment();

      $comment->photo_id     = (int)$photo_id;
      $comment->author       = $author;
      $comment->email        = $email; 
      $comment->comment_body = $comment_body;

      return $comment;

      }else{

      return false;

      }      

  }


  public static function find_the_comments($photo_id=0){
      global $database;
     
      $sql = "SELECT * FROM " .self::$db_table;
      $sql .= " WHERE photo_id = " .$database->escape_string($photo_id);
      $sql .= " ORDER BY photo_id ASC";
 
      return self::find_by_query($sql);

  }








    public function delete_user(){

    if ($this->delete()) {

    $target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->user_image;
    return unlink($target_path) ? true : false;   

    }else{

    return false;
    }


    }



	
 } //End of class



// array_key_exists(key, array);








 ?>