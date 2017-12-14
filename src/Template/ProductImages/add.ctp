<section class="content-header">
    <h1><?= __('Add Product Images for ') ?> <?php echo $product->name; ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-cubes'></i>" . __('Products'), ['controller' => 'products', 'action' => 'index'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-image'></i>" . __('Images'), ['controller' => 'product_images', 'action' => 'index', $product->id],['escape' => false]) ?></li>
        <li class="active"><?= __('Add') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header"></div>
                <div class="box-body">                    
                    <?= $this->Form->create(null,[
                        'class' => 'form-horizontal',
                        'type' => 'file',
                        'enctype' => 'multipart/form-data'            
                    ]) ?>
                    <fieldset>    
                        <?php for($limit = 1; $limit <= $maxUpload; $limit++){ ?>    
                            <div class="form-group">
                                <label for="thumb_<?php echo $limit; ?>" class="col-sm-2 control-label">Image <?php echo $limit; ?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control has-ck-finder" readonly="" name="photos[<?php echo $limit; ?>]" />                        
                                </div>
                            </div> 
                        <?php } ?>                            
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">                            
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index', $product->id],['class' => 'btn btn-warning', 'escape' => false]) ?>                            
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>