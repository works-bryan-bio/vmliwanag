
<section class="content-header">
    <h1><?= __('View Product Category') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($productCategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Product Category') ?></th>
            <td><?= $productCategory->has('parent_product_category') ? $this->Html->link($productCategory->parent_product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $productCategory->parent_product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($productCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($productCategory->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($productCategory->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($productCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($productCategory->modified) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?></td>
        </tr>
    </tbody>
    </table>
    <div class="related">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Related Product Categories') ?></h3>
            </div>
        </div>        
        <?php if (!empty($productCategory->child_product_categories)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>                
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>                
            </tr>
            <?php foreach ($productCategory->child_product_categories as $childProductCategories): ?>
            <tr>
                <td><?= h($childProductCategories->id) ?></td>
                <td><?= h($childProductCategories->name) ?></td>                
                <td><?= h($childProductCategories->created) ?></td>
                <td><?= h($childProductCategories->modified) ?></td>                
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
