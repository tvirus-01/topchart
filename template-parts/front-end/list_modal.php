<div class="modal fade" id="mymodal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" id="video_list"  allowscriptaccess="always">></iframe>
        </div>
        
      </div>

    </div>
  </div>
</div> 

<script type="text/javascript">
  $(document).ready(function() {

// Gets the video src from the data-src on each button

var $videoSrc;  
$('.video_btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);

  
  
// when the modal is opened autoplay it  
$('#mymodal2').on('shown.bs.modal', function (e) {
    
// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$("#video_list").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
})
  
  
// stop playing the youtube video when I close the modal
$('#mymodal2').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video_list").attr('src',$videoSrc); 
}) 
    
    


  
  
// document ready  
});



</script>