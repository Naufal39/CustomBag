<!-- <nav class="navbar navbar-default ">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url('index.php/view/hallo'); ?>">Home </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/view/about'); ?>">About</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/view/kontak'); ?>">Kontak</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/welcome/index'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

  <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">CUSTOM BAG</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="cart.html" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children">
              <a href="<?php echo base_url('index.php/view/hallo'); ?>">Home</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-children">
              <a href="<?php echo base_url('index.php/view/about'); ?>">About</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('view/shop'); ?>">Ready Stock</a></li>
            <li><a href="<?php echo base_url('view/about'); ?>">Catalogue</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="<?php echo base_url('index.php/view/kontak'); ?>">Contact</a></li>
             <li><a href="<?php echo base_url('index.php/welcome/index'); ?>">Login</a></li>
          </ul>
        </div>
      </nav>
    </header>

<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/boostrap.min.js');?>"></script>