<?php use Cake\Utility\Inflector; ?>
<style>
.label{
    padding:10px;    
    display: block;
    width:90px;
}
.thead-inverse th {
    background-color: #2A80B9;
    color: #fff;
    padding:13px !important;
}
th a{
    color:#ffffff;
}
div.box-body{
    padding: 0px;
}
.box-header.with-border {
    border-bottom: 1px solid #2A80B9;
}
.box-body, .box-header{
    overflow:auto;
}
.fa-sort{
    line-height: 19px;
}
div.box-body{
    padding-bottom: 68px;
}
</style>
<section class="content-header">
    <h1><?= __('Search Result') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Search') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->    
    <div class="row">
        <?php if( $result ){ ?>
        <section class="col-lg-12 ">
            <?php 
                if( isset($result['pages']) ){
                    include_once('page_result.ctp');
                }

                if( isset($result['services']) ){
                    include_once('service_result.ctp');
                }

                if( isset($result['technicals']) ){
                    include_once('technicals_result.ctp');
                }

                if( isset($result['products']) ){
                    include_once('products_result.ctp');
                }

                if( isset($result['news']) ){
                    include_once('news_result.ctp');
                }

            ?>
        </section>
        <?php }else{ ?>
        <section class="col-lg-12 ">
            <div class="callout callout-danger">
                <h4>No record(s) found!</h4>
            </div>            
        </section>
        <?php } ?>
    </div>
</section>