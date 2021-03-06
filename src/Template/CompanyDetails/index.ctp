<style>
.company-logo{
    height: 80px;
}
</style>
<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Company Details') ?></li>
    </ol>    
</section>
<section class="content" style="margin-top:10px;">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box box-primary box-solid">   
                <div class="box-header with-border">
                    <?= __('Company Details') ?>
                    <div class="box-tools pull-right">
                        <?= $this->Html->link('<i class="fa fa-pencil"></i> Edit', ['action' => 'edit', $companyDetails->id],['class' => 'btn btn-box-tool', 'escape' => false]) ?>
                    </div>        
                </div>             
                <div class="box-body">
                    <table id="dt-users-list" class="table table-bordered table-hover">                        
                        <tbody>
                            <tr><td>Company Name</td><td><?php echo $companyDetails->name; ?></td></tr>
                            <tr><td>Logo</td><td><img class="company-logo" src="<?php echo $companyDetails->logo; ?>"></td></tr>                            
                            <tr><td>Email</td><td><?php echo $companyDetails->email; ?></td></tr>
                            <tr><td>Inquiry Recipient</td><td><?php echo $companyDetails->inquiry_recipient; ?></td></tr>
                            <tr><td>Address</td><td><?php echo $companyDetails->address; ?></td></tr>
                            <tr><td>Contact Number</td><td><?php echo $companyDetails->contact_number; ?></td></tr>
                            <tr><td>Fax</td><td><?php echo $companyDetails->fax; ?></td></tr>
                            <tr><td>Facebook</td><td><?php echo h($companyDetails->facebook); ?></td></tr>
                            <tr><td>Twitter</td><td><?php echo h($companyDetails->twitter); ?></td></tr>
                        </tbody>
                    </table>                                        
                </div>
            </div>

            <div class="box box-primary box-solid">                  
                <div class="box-header with-border"><?= __('Location') ?></div>   
                <div class="box-body">
                    <style>#map {width: 100%;height: 300px;}</style>
                    <div class="location-tab-map-pane" style="padding:10px;">
                        <div id="map"></div>            
                        <script>
                            function initMap() {
                              var myLatLng = {lat: <?php echo $companyDetails->latitude; ?>, lng: <?php echo $companyDetails->longtitude; ?>};

                              // Create a map object and specify the DOM element for display.
                              var map = new google.maps.Map(document.getElementById('map'), {
                                center: myLatLng,
                                // scrollwheel: false,
                                zoom: 16
                              });

                              // Create a marker and set its position.
                              var marker = new google.maps.Marker({
                                map: map,
                                position: myLatLng,
                                title: 'Regalia large and amazing room!'
                              });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZmDn0hp-VnrzRQK9IKjJeYPTDYWKIE8&callback=initMap&sensor=false" async defer></script>                
                    </div>                                        
                </div>
            </div>  
        </section>
    </div>
</section>