<?php use Cake\Utility\Inflector; ?>
<style>
.label-plan{
    padding:10px;    
    display: block;
    width: auto;
    font-size: 12px;
}
</style>
<div class="box box-primary box-solid">   
<div class="box-header with-border">  
    <div class="user-block">   
        <h3 style="font-size:15px;margin:0px;">Technicals Result</h3>
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
            <?php foreach ($result['technicals'] as $technical): ?>
            <tr>
                <td class="table-actions">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                            <?php $slug = Inflector::slug($technical->name, "-"); ?>                                          
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'technicals', 'action' => $technical->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                            
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'technicals', 'action' => 'edit', $technical->id],['escape' => false]) ?></li>                            
                        </ul>
                    </div>                                           
                </td>
                <td><?= $this->Number->format($technical->id) ?></td>
                <td><?= h($technical->name) ?></td>
                <td>
                    <?php 
                        if( $technical->is_publish == 1 ){
                            echo "<span class=\"label label-success\">Published</span>";
                        }else{
                            echo "<span class=\"label label-danger\">Unpublished</span>";
                        }
                    ?>
                </td>                                
                <td><?= h($technical->created) ?></td>
                <td><?= h($technical->modified) ?></td>                  
            </tr>
            <?php ;endforeach; ?>
        </tbody>
    </table>
</div>
</div>