 
$(document).ready(function(){

     var user_href;
     var user_href_splitted;
     var user_id;
     var image_src;
     var image_href_splitted;
     var image_name;
     var photo_id;


     $(".modal_thumbnails").click(function(){ 

     $("#set_user_image").prop('disabled', false);

     $(this).addClass('selected');
     user_href = $("#user-id").prop("href");
     user_href_splitted = user_href.split("=");
     user_id = user_href_splitted[user_href_splitted.length -1];

     image_src = $(this).prop("src");
     image_href_splitted = image_src.split("/");
     image_name = image_href_splitted[image_href_splitted.length -1];



     photo_id = $(this).attr("data");

     $.ajax({

     url: "includes/ajax_code.php",
     data:{photo_id:photo_id},
     type: "POST",
     success:function(data){

     if(!data.error) {

     $("#modal_sidebar").html(data);

     }

     }

   });

 });

     $("#set_user_image").click(function(){


     $.ajax({

     url: "includes/ajax_code.php",
     data:{image_name: image_name, user_id:user_id},
     type: "POST",
     success:function(data){

     if(!data.error) {

     $(".user_image_box a img").prop('src', data);

     }

     }

  });   

});     


/*************Edit Photo side bar************/

$(".info-box-header").click(function(){

$(".inside").slideToggle(500);

$("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");

});



/***********Delete Method***********/
$(".delete_post").click(function(){


return confirm("Are you sure you want to delete this post.");

});


 tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

});


