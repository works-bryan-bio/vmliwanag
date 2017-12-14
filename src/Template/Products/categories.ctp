<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<style>
.product-container h3{
	height: 50px;
}
@media screen and (max-width: 600px) {
	.product-container h3{
		font-size: 18px;
	}	
}
.product-container img{
	max-height: 426px;
}
.thumbnail {
    position:relative;
    overflow:hidden;
}
 
.caption {
    position:absolute;
    top:0;
    right:0;
    background:rgba(66, 139, 202, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}
.caption h4{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    font-weight: bold;
}
</style>
<div class="content container">
	<div class="row product-listing-container">
	<?php foreach($categories as $c){ ?>
	<?php 
		$category_slug = Inflector::slug($c->name, "-");
		if( $c->cover_image != '' ){
			$product_category_image = $c->cover_image;
		}else{
			$product_category_image = $this->Url->build("/webroot/img/logo.png");
		}
	?>							        

        <div class="col-xs-6 col-sm-4 col-md-4 product-container">
        	<a href="<?php echo $this->Url->build('/products/listing/' . $c->id . '/' . $category_slug); ?>">
        	<div class="thumbnail">
                <div class="caption">
                    <h4><?php echo $c->name; ?></h4>                                                            
                </div>
                <img class="img-responsive" src="<?php echo $product_category_image; ?>"/>
            </div>        	
            </a>
        </div>		      		      		    		    		
	<?php } ?>	
	</div>				
	<div class="clearfix"></div>
	<div class="paginator" style="text-align:center;margin-top:80px;">
        <ul class="pagination">
        <?= $this->Paginator->prev('«') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('»') ?>
        </ul>
        <p class="hidden"><?= $this->Paginator->counter() ?></p>
    </div>    
</div>
