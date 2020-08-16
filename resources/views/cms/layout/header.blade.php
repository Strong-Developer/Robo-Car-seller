<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120, 'stickyChangeLogo': false}">
  <div class="header-body">
    <div class="header-top header-top-dark">
      <div class="header-top-container container">
        <div class="header-row">
          <div class="header-column justify-content-start">
            <span class="d-none d-md-flex align-items-center ml-4">
              <a href="mailto:you@domain.com">EMAIL: info@robonegotiator.com</a>
            </span>
          </div>
          <div class="header-column justify-content-end">
            <ul class="nav">
              <?php if (Auth::user()) {
                ?>
                  <li class="nav-item">
                    <a href="<?php echo URL::to("/login-2"); ?>" class="nav-link">MY ACCOUNT</a>
                  </li>
                <?php
              }
              ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-container container">
      <div class="header-row">
        <div class="header-column justify-content-start">
          <div class="header-logo">
            <a href="<?php echo URL::to("/"); ?>">
              <img alt="ROBO" width="200" height="" src="http://sandbox.robonegotiator.com/storage/app/images/1574287980.png">
            </a>
          </div>
        </div>
        <div class="header-column justify-content-end">
          <div class="header-search-expanded">
            <form method="GET">
              <div class="input-group bg-light border">
                  <input type="text" class="form-control text-4" name="s" placeholder="I'm looking for..." aria-label="I'm looking for...">
                  <span class="input-group-btn">
                    <button class="btn" type="submit"><i class="lnr lnr-magnifier text-color-dark"></i></button>
                  </span>
              </div>
            </form>
          </div>
          <div class="header-nav justify-content-start">
            <a href="#" class="header-search-button order-1 text-5 d-none d-sm-block mt-1 mr-xl-2">
              <i class="lnr lnr-magnifier"></i>
            </a>
            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
              <nav class="collapse">
                <ul class="nav flex-column flex-lg-row" id="mainNav">
                  <li class="dropdown dropdown-mega">
                    <a class="dropdown-item dropdown-toggle active" href="<?php echo URL::to("/"); ?>">
                      Home
                    </a>

                  </li>
                  <li class="dropdown">
                    <a class="dropdown-item dropdown-toggle" href="#">
                      About
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="https://www.robonegotiator.com/company">About Us</a></li>
                      <li><a class="dropdown-item" href="https://www.robonegotiator.com/solutions-products">Contact</a></li>
                      <li><a class="dropdown-item" href="https://www.robonegotiator.com/integrations">Integrate With Us</a></li>

                    </ul>
                  </li>
                  <li class="dropdown">
                    <a class="dropdown-item dropdown-toggle" href="https://www.robonegotiator.com/company/contact">
                      Contact Us
                    </a>
                  </li>
                  <li class="dropdown dropdown-mega dropdown-mega-style-2">
                    <a class="dropdown-item dropdown-toggle" href="{{route('home.catalog')}}">
                      Product Catalog
                    </a>
                  </li>

                </ul>
              </nav>
            </div>
            <?php if (Auth::user()) { }else{ ?><a href="<?php echo URL::to("/login-2"); ?>" class="btn btn-link text-color-default font-weight-bold order-3 d-sm-block ml-auto mr-2 pt-1 text-1">Login</a> <?php } ?>

            <!-- <div class="mini-cart order-4">
              <span class="font-weight-bold font-primary">Cart / <span class="cart-total">$0.00</span></span>
              <div class="mini-cart-icon">
                <img src="_nwAssets/img/icons/cart-bag.svg" class="img-fluid" alt="" />
                <span class="badge badge-primary rounded-circle">0</span>
              </div>
            </div> -->
            <button class="header-btn-collapse-nav order-4 ml-3" data-toggle="collapse" data-target=".header-nav-main nav">
              <span class="hamburguer">
                <span></span>
                <span></span>
                <span></span>
              </span>
              <span class="close">
                <span></span>
                <span></span>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

