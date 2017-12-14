
<section class="content-header">
    <h1><?= __('View Product') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Product Category') ?></th>
            <td><?= $product->has('product_category') ? $this->Html->link($product->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $product->product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Excerpt') ?></th>
            <td><?= h($product->excerpt) ?></td>
        </tr>
        <tr>
            <th><?= __('Cover Image') ?></th>
            <td><?= h($product->cover_image) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Publish') ?></th>
            <td><?= $this->Number->format($product->is_publish) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Featured') ?></th>
            <td><?= $this->Number->format($product->is_featured) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($product->sorting) ?></td>
        </tr>
    <tr>
        <th><?= __('Body') ?></th>
        <td><?= $this->Text->autoParagraph(h($product->body)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($product->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keyword') ?></th>
        <td><?= $this->Text->autoParagraph(h($product->meta_keyword)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($product->meta_description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
</section>
