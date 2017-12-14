
<section class="content-header">
    <h1><?= __('View News') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($news->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Excerpt') ?></th>
            <td><?= h($news->excerpt) ?></td>
        </tr>
        <tr>
            <th><?= __('Posted By') ?></th>
            <td><?= h($news->posted_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($news->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Publish') ?></th>
            <td><?= $this->Number->format($news->is_publish) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($news->sorting) ?></td>
        </tr>
    <tr>
        <th><?= __('Body') ?></th>
        <td><?= $this->Text->autoParagraph(h($news->body)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($news->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keyword') ?></th>
        <td><?= $this->Text->autoParagraph(h($news->meta_keyword)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($news->meta_description)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Thumb') ?></th>
        <td><?= $this->Text->autoParagraph(h($news->thumb)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($news->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($news->modified) ?></td>
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
