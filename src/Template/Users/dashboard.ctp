<?php use Cake\Utility\Inflector; ?>
<style>
.user-block h2{
  font-size: 14px;
  margin: 3px;
}
#view-selector-container{
  margin-top: 10px;
}
.ViewSelector2-item{
  display: inline-block;
}
input.FormField, select.FormField, textarea.FormField {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #d4d2d0;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: inherit;
    font-feature-settings: inherit;
    font-kerning: inherit;
    font-language-override: inherit;
    font-size: inherit;
    font-size-adjust: inherit;
    font-stretch: inherit;
    font-style: inherit;
    font-synthesis: inherit;
    font-variant: inherit;
    font-weight: 400;
    height: 2.42857em;
    line-height: 1.42857em;
    padding: 0.42857em;
    transition: border-color 0.2s cubic-bezier(0.4, 0, 0.2, 1) 0s;
}
.product-thumb{
    height: 80px;
    width: 80px;
}
</style>
<script>
var BASE_URL = "<?php echo $base_url; ?>";
</script><!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Unpublished Pages</span>
          <span class="info-box-number"><?php echo $pages->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>  

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-cubes"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Products</span>
          <span class="info-box-number"><?php echo $products->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    
  </div>  
  
  <div class="row">       
    <div class="col-md-8">
      <div class="box box-primary box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Unpublished Pages') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>
                          <th class="actions"><?= __('Actions') ?></th>
                          <th><?=  __("Id") ?></th>
                          <th style="width:80%;"><?= __("Name") ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($pages as $page): ?>
                      <tr>
                          <td class="table-actions">
                              <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                      Action <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                      <?php $slug = Inflector::slug($page->name, "-"); ?>                                          
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'pages', 'action' => $page->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                                    
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'pages', 'action' => 'edit', $page->id],['escape' => false]) ?></li>                                    
                                  </ul>
                              </div>                                               
                          </td>
                          <td><?= $this->Number->format($page->id) ?></td>
                          <td><?= h($page->name) ?></td>                                                                        
                      </tr>
                      <?php ;endforeach; ?>
                  </tbody>
              </table>                               
          </div>
      </div>
    </div>  

    <div class="col-md-4">
      <div class="box box-warning box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Recently Added Pages') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>                          
                          <th><?= __("Id") ?></th>
                          <th style="width:80%;"><?= __("Name") ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($recentlyPages as $page): ?>
                      <tr>                          
                          <td><?= $this->Number->format($page->id) ?></td>
                          <td><?= h($page->name) ?></td>                                                                        
                      </tr>
                      <?php ;endforeach; ?>
                  </tbody>
              </table>                               
          </div>
      </div>
    </div>
  </div>
  <!-- End Pages -->

  <!-- Products -->
  <div class="row">    
    <div class="col-md-12">
      <div class="box box-primary box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Recently Added Products') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th class="actions"><?= __('Actions') ?></th>
                        <th><?= __("Id") ?></th>                                
                        <th style="width:5%;"><?= __('Image') ?></th>
                        <th style="width:40%;"><?= __("Product Name") ?></th>
                        <th><?= __("Product Category") ?></th>
                        <th><?= __("Is Published") ?></th>
                        <th><?= __("Is Featured") ?></th>       
                        <th><?= __("Created") ?></th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentlyProducts as $product): ?>
                    <tr>
                        <td class="table-actions">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                                    <?php $slug = Inflector::slug($product->name, "-"); ?>                                          
                                    <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'products', 'action' => $product->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                                    <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'products', 'action' => 'edit', $product->id],['escape' => false]) ?></li>
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
                    </tr>
                    <?php ;endforeach; ?>
                </tbody>
            </table>                              
          </div>
      </div>
    </div>
  </div>
  <!-- End Products -->
</section>
<!-- /.content -->
