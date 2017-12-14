<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<br class="clear">
    <br/>
    <section class="products-section" style="background-color: #f8f8f8;padding-bottom: 65px;padding-top: 55px;">
      <div class="container-wide">
       <br/>
       <h1 class="aleternate-font caption center">Our Products</h1>
       <br/><br/>
       <?php foreach( $products as $p ){ ?>
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
        <div class="paginator" style="text-align:center;margin-top:80px;">
	        <ul class="pagination">
	        <?= $this->Paginator->prev('«') ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next('»') ?>
	        </ul>	        
	    </div>
      </div>
    </section>