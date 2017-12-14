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
</style>
<script>
var BASE_URL = "<?php echo $base_url; ?>";
</script><!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Unpublished Pages</span>
          <span class="info-box-number"><?php echo $pages->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Unpublished Services</span>
          <span class="info-box-number"><?php echo $services->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-briefcase"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Unpublished Plans</span>
          <span class="info-box-number"><?php echo $plans->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-black-tie"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Unpublished Careers</span>
          <span class="info-box-number"><?php echo $careers->count(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Pages -->
  <div class="row">   
    <div class="col-md-12"> 
    <div class="box box-primary box-solid">  
        <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Google Analytics') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body" style="min-height:300px;display:block;">
              <header>
                <div id="embed-api-auth-container" style="display:none;"></div>
                <div id="view-selector-container"></div>
                <div id="view-name" style="display:none;"></div>
                <div id="active-users-container" class="pull-right"></div>
              </header>
              <div class="Chartjs">
                <h3>This Week vs Last Week (by sessions)</h3>
                <figure class="Chartjs-figure" id="chart-1-container"></figure>
                <ol class="Chartjs-legend" id="legend-1-container"></ol>
              </div>
              <div class="Chartjs">
                <h3>This Year vs Last Year (by users)</h3>
                <figure class="Chartjs-figure" id="chart-2-container"></figure>
                <ol class="Chartjs-legend" id="legend-2-container"></ol>
              </div>
              <div class="Chartjs">
                <h3>Top Browsers (by pageview)</h3>
                <figure class="Chartjs-figure" id="chart-3-container"></figure>
                <ol class="Chartjs-legend" id="legend-3-container"></ol>
              </div>
              <div class="Chartjs">
                <h3>Top Countries (by sessions)</h3>
                <figure class="Chartjs-figure" id="chart-4-container"></figure>
                <ol class="Chartjs-legend" id="legend-4-container"></ol>
              </div>
          </div>
    </div>
    </div>
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
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
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
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
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

  <!-- Services -->
  <div class="row">    
    <div class="col-md-8">
      <div class="box box-primary box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Unpublished Services') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>
                          <th class="actions"><?= __('Actions') ?></th>
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($services as $service): ?>
                      <tr>
                          <td class="table-actions">
                              <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                      Action <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                      <?php $slug = Inflector::slug($service->name, "-"); ?>                                          
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'services', 'action' => $service->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                                    
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'services', 'action' => 'edit', $service->id],['escape' => false]) ?></li>                                    
                                  </ul>
                              </div>                                               
                          </td>
                          <td><?= $this->Number->format($service->id) ?></td>
                          <td><?= h($service->name) ?></td>                                                                        
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
              <div class="user-block"><h2><?= __('Recently Added Services') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>                          
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($recentlyServices as $service): ?>
                      <tr>                          
                          <td><?= $this->Number->format($service->id) ?></td>
                          <td><?= h($service->name) ?></td>                                                                        
                      </tr>
                      <?php ;endforeach; ?>
                  </tbody>
              </table>                               
          </div>
      </div>
    </div>
  </div>
  <!-- End Services -->

  <!-- Plans -->
  <div class="row">    
    <div class="col-md-8">
      <div class="box box-primary box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Unpublished Plans') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>
                          <th class="actions"><?= __('Actions') ?></th>
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                          
                          <th style="width:50%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                          <th><?= $this->Paginator->sort('plan_category_id', __("Plan Category") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($plans as $plan): ?>
                      <tr>
                          <td class="table-actions">
                              <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                      Action <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                      <?php $slug = Inflector::slug($plan->name, "-"); ?>                                          
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'plans', 'action' => $plan->id, $slug],['escape' => false, 'target' => '_new']) ?></li>
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'plans', 'action' => 'edit', $plan->id],['escape' => false]) ?></li>                                    
                                  </ul>
                              </div>                                               
                          </td>
                          <td><?= $this->Number->format($plan->id) ?></td>
                          <td><?= h($plan->name) ?></td>  
                          <td><?= h($plan->plan_category->name) ?></td>                                                                      
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
              <div class="user-block"><h2><?= __('Recently Added Plans') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>                          
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                          
                          <th style="width:50%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                          <th><?= $this->Paginator->sort('plan_category_id', __("Plan Category") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($plans as $plan): ?>
                      <tr>                          
                          <td><?= $this->Number->format($plan->id) ?></td>
                          <td><?= h($plan->name) ?></td>  
                          <td><?= h($plan->plan_category->name) ?></td>                                                                      
                      </tr>
                      <?php ;endforeach; ?>
                  </tbody>
              </table>                                     
          </div>
      </div>
    </div>
  </div>
  <!-- End Plans -->

  <!-- Careers -->
  <div class="row">    
    <div class="col-md-8">
      <div class="box box-primary box-solid">   
          <div class="box-header with-border">  
              <div class="user-block"><h2><?= __('Unpublished Careers') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>
                          <th class="actions"><?= __('Actions') ?></th>
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('job_title', __("Job Title") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($careers as $career): ?>
                      <tr>
                          <td class="table-actions">
                              <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                      Action <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                      <?php $slug = Inflector::slug($career->job_title, "-"); ?>                                          
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-search-plus"></i> Preview', ['controller' => 'careers', 'action' => $career->id, $slug],['escape' => false, 'target' => '_new']) ?></li>                                    
                                      <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['controller' => 'careers', 'action' => 'edit', $career->id],['escape' => false]) ?></li>                                    
                                  </ul>
                              </div>                                               
                          </td>
                          <td><?= $this->Number->format($career->id) ?></td>
                          <td><?= h($career->job_title) ?></td>                                                                        
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
              <div class="user-block"><h2><?= __('Recently Added Careers') ?></h2></div>            
              <div class="box-tools" style="top:9px;">                                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                        
              </div>         
          </div>             
          <div class="box-body">                    
              <table id="dt-users-list" class="table table-hover table-striped">
                  <thead class="thead-inverse">
                      <tr>                          
                          <th><?= $this->Paginator->sort('id', __("Id") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>
                          <th style="width:80%;"><?= $this->Paginator->sort('name', __("Name") . "<i class='fa fa-sort pull-right'> </i>", array('escape' => false)) ?></th>                                                             
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($recentlyCareers as $career): ?>
                      <tr>                          
                          <td><?= $this->Number->format($career->id) ?></td>
                          <td><?= h($career->job_title) ?></td>                                                                        
                      </tr>
                      <?php ;endforeach; ?>
                  </tbody>
              </table>                               
          </div>
      </div>
    </div>
  </div>
  <!-- End Careers -->

</section>
<!-- /.content -->
