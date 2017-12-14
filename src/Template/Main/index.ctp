<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<section class="solutions-section" style="background-color: #f8f8f8;">
      <div class="container-wide">
        <div class="col-md-6 left solutions-content">
          <h1 class="aleternate-font caption center">We provide innovative,<Br/>sustainable solutions</h1>
          <br class="clear" />
          <div style="border-top:1px solid #f6d56b;width: 40%;margin: 0 auto;"></div>
          <br class="clear" />
          <br/>
          <div class="solutions-description">
            <p class="ptsans-font">VMLiwanag Industries Corp. is a registered, private and independent company, owned and controlled by Filipino professionals intending to serve the needs in cleaning, packaging and facility maintenance of various institutions.</p>
            <br/>
            <p class="ptsans-font">Customer service and delight is the priority of our company policies. We are committed towards maintaining the very highest of quality standards and providing our customers with cost-effective and innovative products along with dedicated services.</p>
            <div class="center product-btn-container">
              <a class="product-btn" href="">OUR PRODUCTS</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 left">
          <div class="col-md-6 collage left">
            <img class="default" src="<?= $this->Url->build("/webroot/images/collage/collage-1.jpg") ?>">
          </div>
          <div class="col-md-6 collage left">
            <img class="default" src="<?= $this->Url->build("/webroot/images/collage/collage-2.jpg") ?>">
          </div>
          <div class="col-md-6 collage left">
            <img class="default" src="<?= $this->Url->build("/webroot/images/collage/collage-3.jpg") ?>">
          </div>
          <div class="col-md-6 collage left">
            <img class="default" src="<?= $this->Url->build("/webroot/images/collage/collage-4.jpg") ?>">
          </div>
        </div>  
        <br class="clear">      
      </div>
    </section>

    <section class="products-section" style="padding-bottom: 65px;padding-top: 55px;">
      <div class="container-wide">
       <br/>
       <h1 class="aleternate-font caption center">Our Products</h1>
       <br/><br/>
       <?php foreach($products as $p){ ?>
        <?php 
          $product_slug = Inflector::slug($p->name, "-"); 
          $cover_image  = $this->Url->build("/webroot/img/default_product.jpg");        
          if( $p->cover_image != '' ){
            $cover_image = $p->cover_image;
          }
        ?>
        <div class="col-md-3 left products">
          <img class="default" src="<?= $cover_image ?>">
          <div class="product-description">
            <h4 class="ptsans-font center"><?= $p->name ?></h4>
            <a href="<?= $this->Url->build('/product/' . $p->id . '/' . $product_slug) ?>" class="details">DETAILS</a>
          </div>
        </div>
        <?php } ?>       
        <br class="clear">
        <div class="center product-btn-container">
          <a class="product-btn" href="">SEE ALL PRODUCTS</a>
        </div>
      </div>
    </section>