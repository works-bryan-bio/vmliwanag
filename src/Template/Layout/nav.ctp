<ul class="navigation">
    <li class="nav-item"><img src="<?= $this->Url->build("/webroot/img/logo-mobile.jpg") ?>" style="width:100%;max-width: 435px;"></li>
    <li class="nav-item"><a class="ptsans-font" href="<?= $this->Url->build('/') ?>">Home</a></li>
    <li class="nav-item"><a class="ptsans-font" href="<?= $this->Url->build('/about-us') ?>">About</a></li>
    <li class="nav-item"><a class="ptsans-font" href="<?= $this->Url->build('/products/listing') ?>">Products</a></li>
    <li class="nav-item"><a class="ptsans-font" href="<?= $this->Url->build('/news/listing') ?>">News</a></li>
    <li class="nav-item"><a class="ptsans-font" href="<?= $this->Url->build('/contact-us') ?>">Contact</a></li>
  </ul>
  <input type="checkbox" id="nav-trigger" class="nav-trigger" />

  <div class="wrapper site-wrap">

    <section class="desktop-menu container-wide" style="position: relative;top:0px;left:0px;bottom: 0px;width: 100%;z-index: 10;height: 120px;background-color: white;border-top: 2px solid #f6d56a;">
      <div class="col-md-12 no-space" style="background-color: white;">
        <div class="col-md-4 no-space left logo-container">
          <a href="<?= $this->Url->build('/') ?>"><img src="<?= $this->Url->build("/webroot/img/logo.jpg") ?>" style="width:100%;max-width: 435px;"></a>
        </div>
        <div class="col-md-8 no-space left">
          <nav id="menu" role="navigation" style="float: right;padding-top: 25px;">
            <ul class="menu-header" style="">
                <li><a href="<?= $this->Url->build('/') ?>" class="uppercase right ptsans-font">Home</a></li>
                <li><a href="<?= $this->Url->build('/about-us') ?>" class="uppercase right ptsans-font">About Us</a></li>
                <li><a href="<?= $this->Url->build('/products/listing') ?>" class="uppercase right ptsans-font">Products</a></li> 
                <li><a href="<?= $this->Url->build('/news/listing') ?>" class="uppercase right ptsans-font">News</a></li>
                <li><a href="<?= $this->Url->build('/contact-us') ?>" class="uppercase right ptsans-font">Contact Us</a></li>
            </ul>
          </nav> 
        </div>
      </div>
    </section>

    <section class="mobile-menu" style="border-top: 2px solid #f6d56a;">
      <div class="col-md-12" style="padding-top: 0px;margin-bottom: 0px;padding-right: 0px;padding-left: 0px;">
        <div class="container-wide full-screen-mobile">
          <div class="col-md-12 no-space left header-logo">
            <nav id="menu" role="navigation">
              
              <div class="col-sm-1 menu-icon no-space left">
                <ul class="menu-header-mobile">
                  <li><label for="nav-trigger"><i class="fa fa-bars" style="color:black" aria-hidden="true"></i></label></li>
                </ul>
              </div>
              <div class="col-sm-7 no-space left">
                <img src="<?= $this->Url->build("/webroot/img/logo.jpg") ?>" style="width:100%;max-width: 330px;">
              </div>
            </nav>      
          </div>
        </div>
      </div>
    </section>
    <br style="clear: both;">