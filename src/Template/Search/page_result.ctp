<?php use Cake\Utility\Inflector; ?>
<div class="box box-primary box-solid">   
<div class="box-header with-border">  
    <div class="user-block">   
        <h3 style="font-size:15px;margin:0px;">Pages Result</h3>
    </div>
    
    <div class="box-tools" style="top:9px;">                               
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
            <?php foreach ($result['pages'] as $page): ?>
            <tr>
                <td class="table-actions">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                            <?php $slug = Inflector::slug($page->name, "-"); ?>                                          
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'pages', 'action' => $page->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                            
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'pages', 'action' => 'edit', $page->id],['escape' => false]) ?></li>
                        </ul>
                    </div>   
                    <div id="modal-page-delete-<?=$page->id?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Delete Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p><?= __('Are you sure you want to delete selected page?') ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                <?= $this->Form->postLink(
                                        'Yes',
                                        ['controller' => 'pages', 'action' => 'delete', $page->id],
                                        ['class' => 'btn btn-danger', 'escape' => false]
                                    )
                                ?>
                            </div>
                          </div>
                        </div>                              
                    </div>

                    <div id="modal-publish-<?=$page->id?>" class="modal fade">
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
                                        ['action' => 'publish', $page->id],
                                        ['class' => 'btn btn-info', 'escape' => false]
                                    )
                                ?>
                            </div>
                          </div>
                        </div>                              
                    </div>

                    <div id="modal-unpublish-<?=$page->id?>" class="modal fade">
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
                                        ['action' => 'unpublish', $page->id],
                                        ['class' => 'btn btn-danger', 'escape' => false]
                                    )
                                ?>
                            </div>
                          </div>
                        </div>                              
                    </div>                       
                </td>
                <td><?= $this->Number->format($page->id) ?></td>
                <td><?= h($page->name) ?></td>
                <td>
                    <?php 
                        if( $page->is_publish == 1 ){
                            echo "<span class=\"label label-success\">Published</span>";
                        }else{
                            echo "<span class=\"label label-danger\">Unpublished</span>";
                        }
                    ?>
                </td>                                
                <td><?= h($page->created) ?></td>
                <td><?= h($page->modified) ?></td>                  
            </tr>
            <?php ;endforeach; ?>
        </tbody>
    </table>             
</div>
</div>