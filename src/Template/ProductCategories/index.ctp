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
.product-category-thumb{
    height: 80px;
    width: 80px;
}
</style>
<section class="content-header">
    <?php if( $productCategoryParent ){ ?>
        <h1><?= __('Parent Category') . ' : ' . $productCategoryParent->name ?></h1>
    <?php }else{ ?>
        <h1><?= __('Product Categories') ?></h1>
    <?php } ?>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Product Categories') ?></li>
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

                        <?php 
                            if( $parent_id > 0 ){                                
                                echo $this->Html->link('<i class="fa fa-plus"></i> Add New', ['action' => 'add', $parent_id],['class' => 'btn btn-box-tool', 'escape' => false]);
                                if( $productCategoryParent->parent_id > 0 ){
                                    echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back', ['action' => 'index', $productCategoryParent->parent_id],['class' => 'btn btn-box-tool', 'escape' => false]);
                                }else{
                                    echo $this->Html->link('<i class="fa fa-mail-reply"></i> Back', ['action' => 'index'],['class' => 'btn btn-box-tool', 'escape' => false]);
                                }                                
                            }else{
                                echo $this->Html->link('<i class="fa fa-plus"></i> Add New', ['action' => 'add'],['class' => 'btn btn-box-tool', 'escape' => false]);    
                            }
                        ?>                                        
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
                    </div>         
                </div>             
                <div class="box-body">                    
                    <table id="dt-users-list" class="table table-hover table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="actions"><?= __('Actions') ?></th>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= __("Image") ?></th>
                                <th style="width:70%;"><?= $this->Paginator->sort('name') ?></th>                                
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>                                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productCategories as $productCategory): ?>
                            <tr>
                                <td class="table-actions">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                            Action <span class="caret"></span>
                                        </button>
                                        <?php 
                                            if( $productCategory->cover_image != '' ){
                                                $img = $productCategory->cover_image;
                                            }else{
                                                $img = $this->Url->build("/webroot/img/default_product.jpg");
                                            }
                                        ?>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> View', ['action' => 'view', $productCategory->id],['escape' => false]) ?></li>
                                            <li role="presentation"><a href="<?php echo $img; ?>" title="View" data-fancybox data-caption="<?php echo $productCategory->name; ?>"><i class="fa fa-image"></i> Preview Image</a></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-sitemap"></i> Add Sub Category', ['action' => 'add', $productCategory->id],['escape' => false]) ?></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-sitemap"></i> View Sub Categories', ['action' => 'index', $productCategory->id],['escape' => false]) ?></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['action' => 'edit', $productCategory->id],['escape' => false]) ?></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash"></i> Delete', '#modal-'.$productCategory->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                        </ul>
                                    </div>   
                                    <div id="modal-<?=$productCategory->id?>" class="modal fade">
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
                                                        ['action' => 'delete', $productCategory->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                       
                                </td>
                                <td><?= $this->Number->format($productCategory->id) ?></td>
                                <td>
                                    <?php 
                                        if( $productCategory->cover_image != '' ){
                                            $img = $productCategory->cover_image;
                                        }else{
                                            $img = $this->Url->build("/webroot/img/default_product.jpg");
                                        }
                                    ?>
                                    <img class="product-category-thumb" src="<?php echo $img; ?>" />
                                </td>
                                <td><?= h($productCategory->name) ?></td>                                
                                <td><?= h($productCategory->created) ?></td>
                                <td><?= h($productCategory->modified) ?></td>                  
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