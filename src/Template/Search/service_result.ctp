<?php use Cake\Utility\Inflector; ?>
<div class="box box-primary box-solid">   
<div class="box-header with-border">  
    <div class="user-block">   
        <h3 style="font-size:15px;margin:0px;">Services Result</h3>
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
        <?php foreach ($result['services'] as $service): ?>
        <tr>
            <td class="table-actions">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                        <?php $slug = Inflector::slug($service->name, "-"); ?>                                          
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'services', 'action' => $service->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                       
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'services', 'action' => 'edit', $service->id],['escape' => false]) ?></li>
                    </ul>
                </div>   
                <div id="modal-services-delete-<?=$service->id?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Delete Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p><?= __('Are you sure you want to delete selected service?') ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                            <?= $this->Form->postLink(
                                    'Yes',
                                    ['controller' => 'services', 'action' => 'delete', $service->id],
                                    ['class' => 'btn btn-danger', 'escape' => false]
                                )
                            ?>
                        </div>
                      </div>
                    </div>                              
                </div>

                <div id="modal-publish-<?=$service->id?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p><?= __('Are you sure you want to publish selected entry?') ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                            <?= $this->Form->postLink(
                                    'Yes',
                                    ['action' => 'publish', $service->id],
                                    ['class' => 'btn btn-info', 'escape' => false]
                                )
                            ?>
                        </div>
                      </div>
                    </div>                              
                </div>

                <div id="modal-unpublish-<?=$service->id?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p><?= __('Are you sure you want to unpublish selected entry?') ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                            <?= $this->Form->postLink(
                                    'Yes',
                                    ['action' => 'unpublish', $service->id],
                                    ['class' => 'btn btn-danger', 'escape' => false]
                                )
                            ?>
                        </div>
                      </div>
                    </div>                              
                </div>                       
            </td>
            <td><?= $this->Number->format($service->id) ?></td>
            <td><?= h($service->name) ?></td>
            <td>
                <?php 
                    if( $service->is_publish == 1 ){
                        echo "<span class=\"label label-success\">Published</span>";
                    }else{
                        echo "<span class=\"label label-danger\">Unpublished</span>";
                    }
                ?>
            </td>                                
            <td><?= h($service->created) ?></td>
            <td><?= h($service->modified) ?></td>                  
        </tr>
        <?php ;endforeach; ?>
    </tbody>
</table>             
</div>
</div>