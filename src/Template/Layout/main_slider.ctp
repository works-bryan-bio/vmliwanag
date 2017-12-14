<?php 
  $total_slides = $slides->count(); 
  $counter = 1;
?>
<section class="carousel-section">
      <div class="wrapper">
          <div class="jcarousel-wrapper">
              <div class="jcarousel">
                  <ul>
                    <?php foreach($slides as $slide) { ?>
                      <li><img src="<?php echo $slide->image; ?>" alt="<?php echo $slide->title; ?>"></li>
                    <?php } ?>                    
                  </ul>
              </div>
              <div style="position: relative;right: 30px;">
                  <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                  <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
              </div>
              <!-- <p class="jcarousel-pagination"></p> -->
          </div>
      </div>
    </section>