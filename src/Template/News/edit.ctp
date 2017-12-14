<?php use Cake\Utility\Inflector; ?>
<section class="content-header">
    <h1><?= __('Edit News') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-newspaper-o'></i>" . __('News'), ['action' => 'index'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create($news,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                                                            echo "
                                    <div class='form-group'>
                                        <label for='title' class='col-sm-2 control-label'>" . __('Title') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('title', ['class' => 'form-control', 'id' => 'title', 'label' => false]);                
                                    echo " </div></div>";    

                                    echo "
                                    <div class='form-group'>
                                        <label for='thumb' class='col-sm-2 control-label'>" . __('Cover Image') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('thumb', ['type' > 'text', 'class' => 'form-control has-ck-finder', 'readonly' => 'readonly', 'id' => 'thumb', 'label' => false]);                
                                    echo " </div></div>";   

                                    echo "
                                    <div class='form-group'>
                                        <label for='excerpt' class='col-sm-2 control-label'>" . __('Excerpt') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('excerpt', ['type' => 'textarea', 'class' => 'form-control', 'id' => 'excerpt', 'label' => false]);                
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
                                        <label for='posted_by' class='col-sm-2 control-label'>" . __('Posted By') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('posted_by', ['class' => 'form-control', 'id' => 'posted_by', 'label' => false]);                
                                    echo " </div></div>";  
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='is_publish' class='col-sm-2 control-label'>" . __('Is Publish') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->select('is_publish',["1" => "Yes", "0" => "No"],['default' => $news->is_publish, 'class' => 'form-control', 'id' => 'is_publish', 'label' => false]);                                        
                                    echo " </div></div>";   
                                                ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">     
                            <?php $slug = Inflector::slug($news->title, "-"); ?>                            
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue editing'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-search-plus"> </i> ' . __('Preview'), ['action' => $news->id, $slug],['class' => 'btn btn-warning', 'escape' => false, 'target' => '_new']) ?>                            
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>                            
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>