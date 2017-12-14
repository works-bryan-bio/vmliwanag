<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<style>
.product-image{  
  max-width: 100%;
  height: auto;
  margin: 5px;
}
</style>
<section class="product-single-section" style="background-image: linear-gradient(-21deg,rgba(255,255,255,0) 17%,#ffffff 100%),linear-gradient(-180deg,rgba(255,255,255,.34) 63%,rgba(158, 158, 158, 0.28) 72%,rgba(209,207,207,.34) 100%);">
  <div class="container-wide">
    <div class="col-md-6 left pr-banner">
      <?php 
        $cover_image  = $this->Url->build("/webroot/img/default_product.jpg");        
          if( $product->cover_image != '' ){
            $cover_image = $product->cover_image;
          }
      ?>
      <img class="default" src="<?= $cover_image ?>">
    </div>    
    <div class="col-md-6 left pr-banner">
      <div class="pr-description pr-single">
        <h2 class="aleternate-font pr-title"><span style="color: #fe0002;letter-spacing: -2px;font-weight: bolder;"><?= $product->name ?></span></h2>
        <br class="clear" />
        <div style="border-top:1px solid #f6d56b;width: 40%;margin: 0 auto;"></div>
        <br class="clear" />
        <br/>
        <p class="ptsans-font center" style="color:#909090;"><?= $product->body ?></p>                                
        <div class="row product-listing-container"> 
        <?php foreach( $product->product_images as $i ){ ?>
          <div class="col-xs-6 col-sm-4 col-md-4 product-container">
            <div class="mbr-figure m-2">
              <?php $product_image = $i->image; ?>
              <a href="<?php echo $product_image; ?>" title="View" data-fancybox data-caption="<?php echo $product->name; ?>">
                <img class="img-responsive product-image" src="<?php echo $product_image; ?>"/><br/>              
              </a>
            </div>
          </div>  
        <?php } ?>
      </div>
      <Br /><br />
      </div>
    </div>        
  </div>
  <br class="clear">
</section>
