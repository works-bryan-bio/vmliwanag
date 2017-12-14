    <section class="work-with-us-container">
      <div class="work-banner">
        <div class="container">
          <div class="center work-container">
            <h2 class="white alternate-font">Work with us!</h2>
            <br/>
            <div style="border-top:1px solid #f6d56b;width: 40%;margin: 0 auto;"></div>
            <br/>
            <br/>
            <br/>
            <p class="white ptsans-font">We invest in our customers' success by listening and finding ingenious solutions. When our customers succeed, we all succeed.</p>
          </div>
        </div>
      </div>
    </section>
      
    <section class="message-us-container">
      <div class="message-us-bg">
        <div class="container message-form">
          <h2 class="dark-red alternate-font center">Leave us a message!</h2>
          <br/>
          <p class="white ptsans-font center">If you are interested in becoming a partner or supplier to VMLiwanag Industries Corp. kindly reach out to us!</p>
          <div class="message-form-container">
            <form>
              <div class="col-md-6 form-block left">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Name" class="form-control" id="name">
                    <label for="name" class="glyphicon glyphicon-user" rel="tooltip" title="name"></label>
                </div>
              </div>
              <div class="col-md-6 form-block left">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Phone" class="form-control" id="phone">
                    <label for="phone" class="glyphicon glyphicon-earphone" rel="tooltip" title="phone"></label>
                </div>
              </div>
              <div class="col-md-6 form-block left">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Email" class="form-control" id="email">
                    <label for="email" class="glyphicon glyphicon-envelope" rel="tooltip" title="email"></label>
                </div>
              </div>
              <div class="col-md-6 form-block left">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Subject" class="form-control" id="subject">
                    <label for="subject" class="glyphicon glyphicon-list-alt" rel="tooltip" title="subject"></label>
                </div>
              </div>
              <div class="col-md-12 form-block left">
                <div class="icon-addon addon-lg">
                    <textarea type="text" placeholder="Message" class="form-control" id="message"></textarea>
                    <label for="message" class="glyphicon glyphicon-comment" rel="tooltip" title="message"></label>
                </div>
                <br/>
                <input type="submit" class="submit-btn center">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="footer-container">
      <div class="container" style="">
        <div class="col-md-4 vertical-center footer left">
          <img src="<?= $this->Url->build("/webroot/img/logo-footer.png") ?>" class="logo-footer">
          <br class="clear">
          <p class="ptsans-font">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequate."</p>
        </div>
        <div class="col-md-5 vertical-center-mid footer left">
          <h4 class="white din-font" style="letter-spacing: 2px;">CONTACT INFO</h4>
          <br class="clear">
          <h6 class="red ptsans-font" style="font-weight: 600;">ADDRESS</h6>
          <p class="ptsans-font"><?php echo $companyDetails->address; ?></p>
          <br class="clear">
          <h6 class="red ptsans-font" style="font-weight: 600;">EMAIL</h6>
          <p class="ptsans-font"><?php echo str_replace("/", "<br />", $companyDetails->email); ?></p>
        </div>
        <div class="col-md-3 vertical-center footer r-3 left">
          <h6 class="red ptsans-font" style="font-weight: 600;">PHONE & FAX</h6>
          <p class="ptsans-font"><?php echo str_replace("/", "<br />", $companyDetails->fax); ?></p>
          <br class="clear">
          <h6 class="red ptsans-font" style="font-weight: 600;">MOBILE</h6>
          <p class="ptsans-font"><?php echo str_replace("/", "<br />", $companyDetails->contact_number); ?></p>
        </div>
      </div>
    </section>

    <section class="copyright" style="border-top: 1px solid #949494;background-color: #b5b5b5;height: 50px;">
        <div class="col-md-12 no-space" style="padding-top: 13px;">
          <h5 class="gray ptsans-font" style="text-align: center;font-size: 17px;font-weight: 300;">Copyright 2017 vmlic.com</h5>
        </div>
    </section>
  </div>
<?php 
  echo $this->Html->script('front/modernizr');
  echo $this->Html->script('front/jquery');
  echo $this->Html->script('front/carousel/jquery.jcarousel.min');
  echo $this->Html->script('front/carousel/jcarousel.responsive.js');
  echo $this->Html->script('front/bootstrap.bundle.min.js');

  if( isset($enable_fancy_box) ){
    echo $this->Html->css('jquery.fancybox.min');
    echo $this->Html->script('jquery.fancybox.min');    
  }
?>
<script>
var base_url = "<?php echo $base_url; ?>";
</script>

</body>
</html>