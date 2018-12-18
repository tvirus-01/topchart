
<style type="text/css">
	.play-btn{
		background-color: rgba(34, 34, 34, 0.70);
	    height: 35px;
	    padding: 6px 15px;
	    border: 1px solid cadetblue;
	    cursor: pointer;
	    width: 70px;
	}
	.play{
		width: 20px; 
		height: 12px;
	}
	.play-btn-div{ 
		position: inherit;
	    width: 100px;
	    margin: -50px 0 0 60px;
	    height: 35px;
	}
	.play-btn:hover {
		background-color: rgba(34, 34, 34, 0.85);
	}
	.g {
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.33, rgb(14,173,173)), color-stop(0.67, rgb(0,255,255)));
	background-image: -moz-linear-gradient(center bottom, rgb(14,173,173) 33%, rgb(0,255,255) 67% );
	padding: 2px;
	}
	.g2{
		background-color: #7011a035;
		border-left: 2px solid #3EC8AC;
		  border-right: 2px solid #4E90A4;
		  border-radius: 5px;
		  -webkit-box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  box-sizing: border-box;
		  background-position: 0 0, 0 100%;
		  background-repeat: no-repeat;
		  -webkit-background-size: 100% 1px;
		  -moz-background-size: 100% 1px;
		  background-size: 100% 2px;
		  background-image: -webkit-linear-gradient(left, #a1278d 0%, #4E90A4 100%), -webkit-linear-gradient(left, #3EC8AC 0%, #6b216f 100%);
		  background-image: -moz-linear-gradient(left, #a1278d 0%, #4E90A4 100%), -moz-linear-gradient(left, #3EC8AC 0%, #6b216f 100%);
		  background-image: -o-linear-gradient(left, #a1278d 0%, #4E90A4 100%), -o-linear-gradient(left, #3EC8AC 0%, #6b216f 100%);
		  background-image:linear-gradient(to right, #a1278d 0%, #4E90A4 100%), linear-gradient(to right, #3EC8AC 0%, #6b216f 100%);
		  border-top: 1px;
		  border-bottom: 1px;

	}
.modal-dialog {
      max-width: 1000px;
      margin: 30px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
</style>
<div class="container-fluid">
	<div class="row p-5" style="background-image: url(<?php echo plugins_url( '/bg-img/gd.svg', __FILE__ ); ?>); background-repeat: no-repeat;">
		<div class="col">
			<img src="<?php echo plugins_url( '/bg-img/album_image/'.$top_1_album_img, __FILE__ ); ?>" class="ml-5 g">
			<div class="play-btn-div">
				<button class="play-btn video-btn" type="button" data-toggle="modal" data-src="<?php echo $video_url; ?>" data-target="#myModal">
					<img src="<?php echo plugins_url( '/bg-img/play.png', __FILE__ ); ?>" class="play">
				</button>
			</div>
		</div>
		<div class="col">
			<div class="row">
				<div class="col">
					<img src="<?php echo plugins_url( '/bg-img/number-one.svg', __FILE__ ); ?>">
				</div>
				<div class="g2 col-6 text-center p-3">
					<span class="text-secondary font-weight-bold h3">
						<?php if ($top_1_past_pos == 0) { echo "N/A"; }else{ echo $top_1_past_pos; } ?>
					</span><br>
					<span class="text-secondary">Last Week Position</span> 
				</div>
				<div class="col-4">
					
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<h3 class="text-light"><?php echo $top_1_song_nm; ?><br><small style="font-size: 55%;"> <?php echo $top_1_artist_nm ?> </small></h3>
				</div>
			</div>
		</div>
	</div>
	<?php include plugin_dir_path( __FILE__ ).'top_1_modal.php'; ?>

	<div class="row justify-content-center mt-5">
		<div class="col-8">
		<?php
			foreach ($topchart_list as $key) {
				$pos_2 = $key->position_2;
				$pos_1 = $key->position_1;
				$vid_src = $key->video_source;
				$vid_url = $key->video_url;
				$id = $key->song_id;
				$list_modal = "list_modal";
				$vid_btn = 'video-btn-'.$id;

				if ($vid_src == 'youtube') {
				    $vid_url = explode('=', $vid_url);
				    $vid_url = end($vid_url);
				    $vid_url = "https://www.youtube.com/embed/".$vid_url;
				}elseif ($vid_src == 'vimeo') {
				    $vid_url = explode('/', $vid_url);
				    $vid_url = end($vid_url);
				    $vid_url = "https://player.vimeo.com/video/".$vid_url."?badge=0";
				}elseif ($vid_src == 'facebook') {
					$vid_url = $vid_url;
				}
	?>
		<div class="row bg-white shadow mt-2 p-3">
			<div class="col-1">
				<h1><?php echo $key->position_1; ?></h1>
			</div>
			<div class="col">
				<img src="<?php echo plugins_url( "/bg-img/album_image/{$key->album_image}", __FILE__ ); ?>" class="w-75">
				<?php
					if ($pos_2 > $pos_1 AND $pos_2 > 0) {
					?><img src="<?php echo plugins_url( "/bg-img/up.svg", __FILE__ ); ?>" style="position: absolute;"><?php
					}elseif ($pos_1 > $pos_2 AND $pos_2 > 0) {
					?><img src="<?php echo plugins_url( "/bg-img/down.svg", __FILE__ ); ?>" style="position: absolute;"><?php
					}
				?>
			</div>
			<div class="col text-center">
				<br>
				<span class="font-weight-bold"><?php echo $key->song_name; ?></span><br>
				<span class="small"><?php echo $key->artist_name; ?></span>
			</div>
			<div class="col text-center">
				<br>
				<span class="font-weight-bold">
					<?php if ($key->position_2 == 0) { echo "N/A"; }else{ echo $key->position_2; } ?>
				</span>
				<br>
				<span>Last Week Position</span>
			</div>
			<div class="col">
				<br><br>
				<?php
					if ($vid_src == 'facebook') {
						?>

				<button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#mymodal2_fb">
						<?php
					}else{
						?>

				<button class="btn btn-primary float-right video_btn" type="button" data-toggle="modal" data-src="<?php echo $vid_url; ?>" data-target="#mymodal2">
						<?php
					}
				?>
					<img src="<?php echo plugins_url( '/bg-img/play.png', __FILE__ ); ?>" class="play">
				</button>
			</div>
		</div>	
	<?php
				if ($vid_src == 'facebook') {
		include plugin_dir_path( __FILE__ ).'list_modal_fb.php';
					
				}
		}
		include plugin_dir_path( __FILE__ ).'list_modal.php';
		?>
		</div>
	</div>
</div>


<script type="text/javascript">
  $(document).ready(function() {

// Gets the video src from the data-src on each button

var $videoSrc;  
$('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);

  
  
// when the modal is opened autoplay it  
$('#myModal').on('shown.bs.modal', function (e) {
    
// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
})
  
  
// stop playing the youtube video when I close the modal
$('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
}) 
// document ready  
});


</script>