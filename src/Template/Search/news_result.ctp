<?php use Cake\Utility\Inflector; ?>
<div class="box box-primary box-solid">   
<div class="box-header with-border">  
    <div class="user-block">   
        <h3 style="font-size:15px;margin:0px;">News Result</h3>
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
                <th style="width:10%;">Thumb</th>
                <th style="width:50%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                <th><?= $this->Paginator->sort('is_publish', __("Is Publish") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                
                <th><?= $this->Paginator->sort('created', __("Created") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                <th><?= $this->Paginator->sort('modified', __("Modified") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['news'] as $n): ?>
            <tr>
                <td class="table-actions">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                            <?php $slug = Inflector::slug($n->title, "-"); ?>                                          
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'news', 'action' => $n->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'news', 'action' => 'edit', $n->id],['escape' => false]) ?></li>                            
                        </ul>
                    </div>   
                </td>
                <td><?= $this->Number->format($n->id) ?></td>
                <td><img class="news-thumb" src="<?php echo $n->thumb; ?>"></td>
                <td>
                    <?= h($n->title) ?>
                    <?php 
                        echo $n->title . '<br/>' . '<span class="label label-info label-posted-by"> Posted By : ' . $n->posted_by . '</span>';
                    ?>
                        
                </td>
                <td>
                    <?php 
                        if( $n->is_publish == 1 ){
                            echo "<span class=\"label label-success\">Published</span>";
                        }else{
                            echo "<span class=\"label label-danger\">Unpublished</span>";
                        }
                    ?>
                </td>                                
                <td><?= h($n->created) ?></td>
                <td><?= h($n->modified) ?></td>                  
            </tr>
            <?php ;endforeach; ?>
        </tbody>
    </table> 
</div>
</div>