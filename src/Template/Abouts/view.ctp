
<section class="content-header">
    <h1><?= __('View About') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($about->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($about->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Publish') ?></th>
            <td><?= $this->Number->format($about->is_publish) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($about->sorting) ?></td>
        </tr>
    <tr>
        <th><?= __('Body') ?></th>
        <td><?= $this->Text->autoParagraph(h($about->body)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($about->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keyword') ?></th>
        <td><?= $this->Text->autoParagraph(h($about->meta_keyword)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($about->meta_description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($about->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($about->modified) ?></td>
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
