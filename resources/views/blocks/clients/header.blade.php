<!-- header -->
<header class="header">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a href="/" class="navbar-brand order-1 order-lg-2"><img src="{{asset('assets/images/logo.svg')}}" alt="Logo"></a>

          <div class="collapse navbar-collapse order-4 order-lg-1" id="navbarMenu">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown dropdown-sm dropdown-hover">
                <a class="nav-link" href="/">
                  Trang chủ
                </a>
              </li>
              <li class="nav-item dropdown dropdown-sm dropdown-hover">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Thời trang
                </a>
                <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown-1">
                  <ul class="menu-list">
                    @foreach ($categories as $item)
                    <li class="menu-list-item"><a href="{{route('danh-muc', $item->id)}}">{{$item->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('gioi-thieu')}}">
                  Giới Thiệu
                </a>
              </li>
              <li class="nav-item dropdown-lg dropdown-hover">
                <a class="nav-link" href="{{route('lien-he')}}">
                  Liên hệ
                </a>
              </li>
            </ul>
          </div>

          <div class="collapse navbar-collapse order-5 order-lg-3" id="navbarMenu2">
            <ul class="navbar-nav ml-auto position-relative">

              <!-- search -->
              <li class="nav-item dropdown dropdown-md dropdown-hover">
                <a class="nav-icon dropdown-toggle" id="navbarDropdown-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-search d-none d-lg-inline-block"></i>
                  <span class="d-inline-block d-lg-none">Search</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-4">
                  <form action="{{route('search-pro')}}" class="form-group">
                    <input type="text" class="form-control" name="keyw" id="searchForm" placeholder="Tìm kiếm ...">
                  </form>
                </div>
              </li>

              <!-- user area -->
              <li class="nav-item dropdown dropdown-md dropdown-hover">
                <a class="nav-icon dropdown-toggle" id="navbarDropdown-6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-user d-none d-lg-inline-block"></i>
                  <span class="d-inline-block d-lg-none">Account</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-6">
                  <div class="row gutter-2">
                    <div class="col-12">
                      <fieldset>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-label-group">
                              <input type="text" id="inputName" class="form-control form-control-lg" placeholder="Name" required="" value="Dumitru">
                              <label for="inputName">First Name</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-label-group">
                              <input type="text" id="inputSurname" class="form-control form-control-lg" placeholder="Surname" required="">
                              <label for="inputSurname">Surname</label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="col-12 text-center">
                      <a href="#" class="underline fs-14">Forgot Password ?</a>
                    </div>
                    <div class="col-12">
                      <a href="#" class="btn btn-primary btn-block">Sign In</a>
                      <a href="#" class="btn btn-outline-secondary btn-block">Create Account</a>
                    </div>
                  </div>
                </div>
              </li>
              
              <!-- cart -->
              <li class="nav-item dropdown dropdown-md dropdown-hover">
                <a class="nav-icon dropdown-toggle" id="navbarDropdown-8" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-shopping-bag d-none d-lg-inline-block"></i>
                  <span class="d-inline-block d-lg-none">Bag</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-8">
                  <div class="row gutter-3">
                    <div class="col-12">
                      <h3 class="eyebrow text-dark fs-16 mb-0">My Bag</h3>
                    </div>
                    <div class="col-12">
                      <div class="cart-item">
                        <a href="#!" class="cart-item-image"><img src="{{asset('assets/images/demo/product-1.jpg')}}" alt="Image"></a>
                        <div class="cart-item-body">
                          <div class="row">
                            <div class="col-9">
                              <h5 class="cart-item-title">Bold Cuff Insert Polo Shirt</h5>
                              <small>Fred Perry</small>
                              <ul class="list list--horizontal fs-14">
                                <li><s>$85.00</s></li>
                                <li class="text-red">$42.00</li>
                              </ul>
                            </div>
                            <div class="col-3 text-right">
                              <ul class="cart-item-options">
                                <li><a href="#" class="icon-x"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <ul class="list-group list-group-minimal">
                        <li class="list-group-item d-flex justify-content-between align-items-center text-uppercase font-weight-bold">
                          Subtotal
                          <span>$78.00</span>
                        </li>
                      </ul>
                    </div>
                    <div class="col-12">
                      <a href="#" class="btn btn-primary btn-block">Add all to cart</a>
                      <a href="#" class="btn btn-outline-secondary btn-block">View favorites</a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>

          <div class="order-2 d-flex d-lg-none" id="navbarMenuMobile">
            <ul class="navbar-nav navbar-nav--icons ml-auto position-relative">

              <!-- search -->
              <li class="nav-item">
                <a href="#" class="nav-icon"><i class="icon-search"></i></a>
              </li>

              <!-- cart -->
              <li class="nav-item dropdown dropdown-md dropdown-hover">
                <a href="#" class="nav-icon"><i class="icon-shopping-bag"></i></a>
              </li>

              <!-- menu -->
              <li class="nav-item dropdown dropdown-md dropdown-hover">
                <a href="#" class="nav-icon" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="icon-menu"></i>
                </a>
              </li>

            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>