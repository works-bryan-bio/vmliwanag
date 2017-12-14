<div class="headerPic">	
	<div id="header-slider" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">

	        <?php $ai = 1; ?>
	        <?php foreach($slides as $slide) { ?>
	                <?php $ai == 1 ? $active = 'active' : $active = ''; ?>
	                <div class="item <?php echo $active; ?>">
	                  <img src="<?php echo $slide->image; ?>" style="width: 100%; height: auto;" alt="" class="Slide Image">                      
	                  <div class="carousel-caption hidden-xs">
						<h1 data-animate="bounceInDown" class="bounceInDown animated"><?php echo $slide->caption; ?></h1>
					  </div>
	                </div>  
	                <?php $ai++; ?>
	        <?php } ?>
	    </div>				
	</div>
</div>