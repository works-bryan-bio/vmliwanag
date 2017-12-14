<?php use Cake\Utility\Inflector; ?>
<style>
.label-plan{
    padding:10px;    
    display: block;
    width: auto;
    font-size: 12px;
}
.product-thumb{
    height: 80px;
    width: 80px;
}
</style>
<div class="box box-primary box-solid">   
<div class="box-header with-border">  
    <div class="user-block">   
        <h3 style="font-size:15px;margin:0px;">Products Result</h3>
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
            <?php foreach ($result['products'] as $product): ?>
            <tr>
                <td class="table-actions">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                            <?php $slug = Inflector::slug($product->name, "-"); ?>                                          
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'products', 'action' => $product->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['action' => 'edit', $product->id],['escape' => false]) ?></li>
                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-file"></i> Attachments', ['controller' => 'product_attachments', 'action' => 'index', $product->id],['escape' => false]) ?></li>
                        </ul>
                    </div>   
                </td>
                <td><?= $this->Number->format($product->id) ?></td> 
                <td><img class="product-thumb" src="<?php echo $product->cover_image; ?>"></td>                                                            
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
</div>
</div>