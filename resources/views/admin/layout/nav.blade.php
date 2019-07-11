<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{asset('')}}admin/order/listOrder"><img src="{{asset('')}}img/logo2.PNG" alt="logo" width="62px;" /></a>
    <a class="navbar-brand brand-logo-mini" href="{{asset('')}}admin/order/listOrder"><img src="{{asset('')}}img/logo2.png" alt="logo-mini"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>                
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="{{asset('')}}img/avatar/avatar.jpeg" alt="image">
            <span class="availability-status online"></span>             
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">@if(isset($UserLogin->name_user)){{$UserLogin->name_user}}@endif</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-cached mr-2 text-success"></i>
            Activity Log
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{asset('')}}Logout">
            <i class="mdi mdi-logout mr-2 text-primary"></i>
            Signout
          </a>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="mdi mdi-arrow-up"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>