<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<?php 
  if( $page_banner_name == 'news' ){
    $container_width = 'col-md-6';
    $news_slug    = Inflector::slug($recentNews->title, "-"); 
    $banner_image = $this->Url->build("/webroot/images/news/news-banner.jpg");        
    $banner_tile  = $recentNews->title;
    $banner_description = $recentNews->excerpt;
    $banner_link = $this->Url->build('/news/' . $recentNews->id . '/' . $news_slug);
  }elseif( $page_banner_name == 'products' ){    
    $container_width = 'col-md-6';
    $banner_image = $this->Url->build("/webroot/images/product-page/product-banner.jpg");        
    $banner_tile  = '<span style="color: #fe0002;letter-spacing: -7px;font-weight: bolder;">3M</span><span style="color:#8e8e8e;"> Building & Commercial Services</span>';
    $banner_description = "The 3M™ Building and Commercial Services Division (BCSD) provides innovative, sustainable solutions to people around the world who construct, maintain and operate facilities, to protect their buildings and enhance the performance and productivity of their employees";
    $banner_link = '';
  }elseif( $page_banner_name == 'inner_pages' ){
    $container_width = 'col-md-12';
    $banner_image = $this->Url->build("/webroot/images/carousel/banner-1.jpg");        
    $banner_tile  = '';
    $banner_description = '';
    $banner_link = '';
  }else{
    $container_width = 'col-md-12';
    $banner_image = $this->Url->build("/webroot/images/carousel/banner-1.jpg");        
    $banner_tile  = '';
    $banner_description = '';
    $banner_link = '';
  }  
?>
<section class="product-banner-section" style="background-color: #f8f8f8;">
  <div class="container-wide">
    <div class="<?= $container_width ?> left pr-banner">
      <img class="default" src="<?= $banner_image ?>">
    </div>
    <?php if( $page_banner_name == 'products' ){ ?>
    <div class="col-md-6 left pr-banner">
      <div class="pr-description">
        <h2 class="aleternate-font pr-title"><?= $banner_tile ?></h2>
        <br class="clear" />
        <div style="border-top:1px solid #f6d56b;width: 40%;margin: 0 auto;"></div>
        <br class="clear" />
        <br/>
        <p class="ptsans-font center" style="color:#909090;"><?= $banner_description ?></p>
        <?php if($banner_link != ''){ ?>
        <div class="center product-btn-container">
          <a class="product-btn" href="<?= $banner_link ?>">SEE ALL PRODUCTS</a>
        </div>
        <?php } ?>
      </div>
    </div>  
    <?php } ?>      
  </div>
</section>