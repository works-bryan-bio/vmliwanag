<?php use Cake\Utility\Inflector; ?>
<style>
td .label{
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
.product-thumb{
    height: 80px;
    width: 80px;
}
td .dropdown-menu > li > a{
    padding:3px 5px !important;
}
</style>
<section class="content-header">
    <h1><?= __('Products') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Products') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box box-primary box-solid">   
                <div class="box-header with-border">  
                    <div class="user-block">   
                        <?= $this->Form->create(null,[                
                          'url' => ['action' => 'index'],
                          'class' => 'form-inline',
                          'type' => 'GET'
                        ]) ?>                         
                        <div class="input-group input-group-sm">
                            <input class="form-control" name="query" type="text" placeholder="Enter query to search">
                            <span class="input-group-btn">
                                <?= $this->Form->button('<i class="fa fa-search"></i>',['name' => 'search', 'value' => 'search', 'class' => 'btn btn-info btn-flat', 'escape' => false]) ?>                                    
                                <?= $this->Html->link(__('Reset'), ['action' => 'index'],['class' => 'btn btn-success btn-flat', 'escape' => false]) ?>                            
                            </span>
                        </div>                        
                        <?= $this->Form->end() ?>
                    </div>
                    
                    <div class="box-tools" style="top:9px;">                         
                        <?= $this->Html->link('<i class="fa fa-plus"></i> Add New', ['action' => 'add'],['class' => 'btn btn-box-tool', 'escape' => false]) ?>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
                    </div>         
                </div>             
                <div class="box-body">                    
                    <table id="dt-users-list" class="table table-hover table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="actions"><?= __('Actions') ?></th>
                                <th><?= $this->Paginator->sort('id',  __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                
                                <th style="width:5%;"><?= $this->Paginator->sort('cover_image', __('Image')) ?></th>
                                <th style="width:40%;"><?= $this->Paginator->sort('name', __("Product Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('product_category_id', __("Product Category") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('is_publish', __("Is Published") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('is_featured', __("Is Featured") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>       
                                <th><?= $this->Paginator->sort('created', __("Created") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('modified', __("Modified") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                         
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="table-actions">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                                            <?php $slug = Inflector::slug($product->name, "-"); ?>                                          
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['action' => $product->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['action' => 'edit', $product->id],['escape' => false]) ?></li>
                                            <?php if( $product->is_publish == 1 ){ ?>                                                
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-close"></i> Unpublish', '#modal-unpublish-'.$product->id,['data-toggle' => 'modal','escape' => false]) ?></li>  
                                            <?php }else{ ?>
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-check"></i> Publish', '#modal-publish-'.$product->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                            <?php } ?>

                                            <?php if( $product->is_featured == 1 ){ ?>                                                
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-close"></i> Remove to featured', '#modal-remove-featured-'.$product->id,['data-toggle' => 'modal','escape' => false]) ?></li>  
                                            <?php }else{ ?>
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-check"></i> Add to featured', '#modal-add-featured-'.$product->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                            <?php } ?>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-image"></i> Images', ['controller' => 'product_images', 'action' => 'index', $product->id],['escape' => false]) ?></li>
                                            <li role="presentation"><a href="<?php echo $product->cover_image; ?>" title="View" data-fancybox data-caption="<?php echo $product->name; ?>"><i class="fa fa-image"></i> Preview Image</a></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash"></i> Delete', '#modal-'.$product->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                        </ul>
                                    </div>   
                                    <div id="modal-<?=$product->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Delete Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'delete', $product->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>      

                                    <div id="modal-publish-<?=$product->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to publish selected product?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'publish', $product->id],
                                                        ['class' => 'btn btn-info', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>

                                    <div id="modal-unpublish-<?=$product->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to unpublish selected product?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'unpublish', $product->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>

                                    <div id="modal-add-featured-<?=$product->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to add to featured list the selected product?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'add_featured', $product->id],
                                                        ['class' => 'btn btn-info', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>

                                    <div id="modal-remove-featured-<?=$product->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to remove to featured list the selected product?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'remove_featured', $product->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                 
                                </td>
                                <td><?= $this->Number->format($product->id) ?></td> 
                                <td>
                                    <?php 
                                        $cover_image = $this->Url->build("/webroot/img/default_product.jpg");        
                                        if( $product->cover_image != '' ){
                                            $cover_image = $product->cover_image;
                                        }
                                    ?>
                                    <img class="product-thumb" src="<?php echo $cover_image; ?>">
                                </td>                                                            
                                <td><?= h($product->name) ?></td>
                                <td><?= h($product->product_category->name) ?></td>                   

                                <td>
                                    <?php 
                                        if( $product->is_publish == 1 ){
                                            echo "<span class=\"label label-success\">Published</span>";
                                        }else{
                                            echo "<span class=\"label label-danger\">Unpublished</span>";
                                        }
                                    ?>
                                </td>       

                                <td>
                                    <?php 
                                        if( $product->is_featured == 1 ){
                                            echo "<span class=\"label label-success\">Featured</span>";
                                        }else{
                                            echo "<span class=\"label label-danger\">Not Featured</span>";
                                        }
                                    ?>
                                </td>       
                                <td><?= h($product->created) ?></td>
                                <td><?= h($product->modified) ?></td>                              
                            </tr>
                            <?php ;endforeach; ?>
                        </tbody>
                    </table>
                    <div class="paginator" style="text-align:center;">
                        <ul class="pagination">
                        <?= $this->Paginator->prev('«') ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('»') ?>
                        </ul>
                        <p class="hidden"><?= $this->Paginator->counter() ?></p>
                    </div>                     
                </div>
            </div>
        </section>
    </div>
</section>