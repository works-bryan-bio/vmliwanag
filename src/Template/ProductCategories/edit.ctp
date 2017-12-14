<section class="content-header">
    <h1><?= __('Edit Product Category') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-gear'></i>" . __('Product Categories'), ['action' => 'index'],['escape' => false]) ?></li>
        <li class="active"><?= __('Edit') ?></li>
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
                    <?= $this->Form->create($productCategory,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                            if( $productCategory->parent_id > 0 ){
                                echo "
                                <div class='form-group'>
                                    <label for='parent_category' class='col-sm-2 control-label'>" . __('Parent Category') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('parent_category', ['class' => 'form-control', 'id' => 'parent_category', 'readonly' => 'readonly', 'disabled' => 'disabled', 'value' => $productCategory->parent_product_category->name, 'label' => false]);                
                                echo " </div></div>";           
                            } 
                            echo "
                            <div class='form-group'>
                                <label for='name' class='col-sm-2 control-label'>" . __('Name') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('name', ['class' => 'form-control', 'id' => 'name', 'label' => false]);                
                            echo " </div></div>";  
                            echo "
                            <div class='form-group'>
                                <label for='cover_image' class='col-sm-2 control-label'>" . __('Cover Image') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('cover_image', ['type' > 'text', 'class' => 'form-control has-ck-finder', 'readonly' => 'readonly', 'id' => 'cover_image', 'label' => false]);                        
                            echo " </div></div>";
                        ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">                            
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue editing'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?php 
                                if( $productCategory->parent_id > 0 ){
                                    echo $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index', $productCategory->parent_id],['class' => 'btn btn-warning', 'escape' => false]);
                                }else{
                                    echo $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]);    
                                }
                            ?>                            
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>