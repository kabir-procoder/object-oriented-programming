
<?php require_once("init.php"); ?>
<?php 

$photos = Photo::find_all();

 ?>


 <div class="modal fade" id="photo-library">
 	<div class="modal-diolog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
 				<h4 class="modal-title">Gallary System Library</h4>
 			</div>
 			<div class="modal-body">
 				<div class="col-md-9">
 					<div class="thumbnails row">
 						<!-- PHP LOOP CODE HERE -->
 					<?php foreach ($photos as $photo): ?>
                    
                    <div class="col-xs-2">
                    	<a href="#" role="checkbox" aria-checked="false" tabindex="0" class="thumbnail" id="">
                    		<img src="<?php echo $photo->picture_path(); ?>" alt="" class="modal_thumbnails img-responsive" data="<?php echo $photo->id; ?>" style="border-radius: 5px; width: 100%; height: 120px;">
                    	</a>
                    	<div class="photo-id hidden"></div>
                    </div>

                    <?php endforeach; ?>
                    
 					</div>
 				</div>

 				<div class="col-md-3">
 					<div id="modal_sidebar"></div>
 				</div>
 				<div class="clearfix"></div>
 			</div> 

 			<div class="modal-footer">
 				<div class="row">
 					<button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal" style="margin-right: 30px;">Apply</button>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>