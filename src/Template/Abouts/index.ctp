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
</style>
<section class="content-header">
    <h1><?= __('Abouts') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Abouts') ?></li>
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
                                <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th style="width:60%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('is_publish', __("Is Publish") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                
                                <th><?= $this->Paginator->sort('created', __("Created") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                                <th><?= $this->Paginator->sort('modified', __("Modified") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($abouts as $about): ?>
                            <tr>
                                <td class="table-actions">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                            <?php $slug = Inflector::slug($about->name, "-"); ?>                                          
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['action' => $about->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                                            <?php if( $about->is_publish == 1 ){ ?>                                                
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-close"></i> Unpublish', '#modal-unpublish-'.$about->id,['data-toggle' => 'modal','escape' => false]) ?></li>  
                                            <?php }else{ ?>
                                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-check"></i> Publish', '#modal-publish-'.$about->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                            <?php } ?>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['action' => 'edit', $about->id],['escape' => false]) ?></li>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash"></i> Delete', '#modal-'.$about->id,['data-toggle' => 'modal','escape' => false]) ?></li>
                                        </ul>
                                    </div>   
                                    <div id="modal-<?=$about->id?>" class="modal fade">
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
                                                        ['action' => 'delete', $about->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>

                                    <div id="modal-publish-<?=$about->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to publish selected page?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'publish', $about->id],
                                                        ['class' => 'btn btn-info', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>

                                    <div id="modal-unpublish-<?=$about->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to unpublish selected page?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'unpublish', $about->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                       
                                </td>
                                <td><?= $this->Number->format($about->id) ?></td>
                                <td><?= h($about->name) ?></td>
                                <td>
                                    <?php 
                                        if( $about->is_publish == 1 ){
                                            echo "<span class=\"label label-success\">Published</span>";
                                        }else{
                                            echo "<span class=\"label label-danger\">Unpublished</span>";
                                        }
                                    ?>
                                </td>                                
                                <td><?= h($about->created) ?></td>
                                <td><?= h($about->modified) ?></td>                  
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