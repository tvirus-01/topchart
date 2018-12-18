

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
        <?php if ($top_1_vid_src == 'facebook') {
          ?>
          
  <div class="fb-video" data-href="<?php echo $video_url; ?>" data-allowfullscreen="true" data-autoplay="true" data-width="1000" data-show-text="false"><blockquote cite="<?php echo $video_url; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $video_url; ?>">How to Share With Just Friends</a><p>How to share with just friends.</p>Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, 5 December 2014</blockquote></div>
          <?php
        }else{ ?>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always">></iframe>
</div>

<?php }?>
        
        
      </div>

    </div>
  </div>
</div> 
  
  
  


