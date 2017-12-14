<section class="content-header">
    <h1><?= __('Add Product') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-cubes'></i>" . __('Products'), ['action' => 'index'],['escape' => false]) ?></li>
        <li class="active"><?= __('Add') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">

                </div>
                <div class="box-body">
                    <?= $this->Form->create($product,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                            echo "
                            <div class='form-group'>
                                <label for='product_category_id' class='col-sm-2 control-label'>" . __('Product Category') . "</label>
                                <div class='col-sm-6'>";
                                 echo $this->Form->input('product_category_id', ['class' => 'form-control', 'id' => 'product_category_id', 'label' => false, 'options' => $productCategories]);                 
                            echo " </div></div>";    
                            echo "
                            <div class='form-group'>
                                <label for='name' class='col-sm-2 control-label'>" . __('Name') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('name', ['class' => 'form-control', 'id' => 'name', 'label' => false]);                
                            echo " </div></div>";   
                            
                            echo "
                            <div class='form-group'>
                                <label for='excerpt' class='col-sm-2 control-label'>" . __('Excerpt') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('excerpt', ['class' => 'form-control', 'id' => 'excerpt', 'label' => false]);                
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='body' class='col-sm-2 control-label'>" . __('Body') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('body', ['class' => 'form-control ckeditor', 'id' => 'body', 'label' => false]);                
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='meta_title' class='col-sm-2 control-label'>" . __('Meta Title') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('meta_title', ['class' => 'form-control', 'id' => 'meta_title', 'label' => false]);                
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='meta_keyword' class='col-sm-2 control-label'>" . __('Meta Keyword') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('meta_keyword', ['class' => 'form-control', 'id' => 'meta_keyword', 'label' => false]);                
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='meta_description' class='col-sm-2 control-label'>" . __('Meta Description') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('meta_description', ['class' => 'form-control', 'id' => 'meta_description', 'label' => false]);                
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='is_publish' class='col-sm-2 control-label'>" . __('Is Publish') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->select('is_publish',["1" => "Yes", "0" => "No"],['class' => 'form-control', 'id' => 'is_publish', 'label' => false]);                                        
                            echo " </div></div>";    
                            
                            echo "
                            <div class='form-group'>
                                <label for='is_featured' class='col-sm-2 control-label'>" . __('Is Featured') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->select('is_featured',["1" => "Yes", "0" => "No"],['class' => 'form-control', 'id' => 'is_featured', 'label' => false]);                                        
                            echo " </div></div>";    
                        ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">                            
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue adding'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>                            
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>