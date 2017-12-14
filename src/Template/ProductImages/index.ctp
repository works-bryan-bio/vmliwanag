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
.small-image{
    height: 192px;
}

.box-header.with-border {
    border-bottom: 1px solid #2A80B9;
}
.small-image{
    width: 100%;
}
.label{
    padding:10px;    
    display: block;
    width:100%;
    border-radius: 0px;
}
.header-label{
    padding:10px;
    font-size: 12px;
    background-color: #3C8DBC;
    color:#ffffff;
    margin-bottom: 0px;
}
.box-body{
    height: 253px;
}
.product-image-container{
    height: 335px;  
}
.label-cover-image{
    margin-top: 5px;
}
</style>
<section class="content-header">
    <h1><?= __('Product Images') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-cubes"></i> Products</a></li>
        <li class="active"><?= __('Images') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box box-primary box-solid">   
                <div class="box-header with-border">  
                    <h3 style="margin:0px;font-size:16px;"><?php echo __('Product'); ?> : <?php echo $product->name; ?></h3>
                    <div class="box-tools" style="top:9px;">                         
                        <?= $this->Html->link('<i class="fa fa-plus"></i> Add New', ['action' => 'add', $product->id],['class' => 'btn btn-box-tool', 'escape' => false]) ?>                        
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
                    </div>         
                </div>  
                <br />           
                <div class="box-body" style="min-height:600px;">                 
                <div class="">                                                  
                    <?php $item_counter = 1; $is_with_end_tag = false; foreach( $productImages as $i ){ ?>
                        <?php 
                            if( $item_counter == 1 ){
                                $is_with_end_tag = false;                                
                            } 

                            $product_image = $i->image;
                        ?>                        
                        <div class="col-md-3 product-image-container" id="view_<?php echo $i->id; ?>">
                            <div class="box box-custom box-default box-solid">
                                <div class="box-header with-border">
                                  <h3 class="box-title" style="font-size:14px;"></h3>

                                  <div class="box-tools pull-right">   
                                        <a href="<?php echo $product_image; ?>" title="View" data-fancybox data-caption="<?php echo $product->name; ?>" class="btn btn-box-tool"><i class="fa fa-image"></i></a>                                 
                                    <?php                                                                                                                        
                                        if( $i->is_cover_image == 0 ){
                                            echo $this->Html->link('<i class="fa fa-star"></i>', '#modal-cover-image-'.$i->id,['title' => 'Set as Cover Image', 'class' => 'btn btn-box-tool','data-toggle' => 'modal','escape' => false]);
                                        }
                                        echo $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$i->id,['title' => 'Delete', 'class' => 'btn btn-box-tool', 'data-toggle' => 'modal','escape' => false]);
                                    ?>  
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">                                    
                                    <img src="<?php echo $product_image; ?>" class="small-image" />   
                                    <?php 
                                        if( $i->is_cover_image == 1 ){                                            
                                            echo "<span class=\"label label-success label-cover-image\">Cover Image</span>";
                                        }
                                    ?>      
                                    <div id="modal-cover-image-<?=$i->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to set selected image as product cover image?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'update_product_cover_image', $i->id],
                                                        ['class' => 'btn btn-info', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>        

                                    <div id="modal-<?=$i->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Delete Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to delete selected image?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'delete', $i->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                                                            
                                    
                                </div>
                            <!-- /.box-body -->
                            </div>                  
                        </div>                        
                        <?php
                            $item_counter++; 
                            if( $item_counter == 5 ){
                                $item_counter = 1;
                                $is_with_end_tag = true;                              
                            }
                        ?>
                    <?php } ?>    

                    <?php 
                        if( !$is_with_end_tag ){ 
                            //echo "</div>";
                        }
                    ?>      
                </div>                   
                </div>
            </div>
        </section>
    </div>
</section>