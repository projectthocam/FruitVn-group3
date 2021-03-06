<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('adminlte/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
         <a href="{{ route('admin.logout') }}" class="brand-text font-weight-light">
          Logout
      </a>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlte/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
          {{-- <a href="#" class="d-block">{{auth()->user()->name}}</a>--}}

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('categories.index')}}" class="nav-link">
            <i class="nav-icon fa fa-minus-square"></i>
            <p>
              Category
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{ route('menus.index')}}" class="nav-link">
            <i class="nav-icon fa fa-bars"></i>
            <p>
             Menus

            </p>
          </a>
        </li> --}}

        <li class="nav-item">
          <a href="{{ route('product.index')}}" class="nav-link">
            <i class="nav-icon fa fa-cart-plus"></i>
            <p>
             Product

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('slider.index')}}" class="nav-link">
           <i class="nav-icon fa fa-bars"></i>
            <p>
             Slider

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon fa fa-user-circle"></i>
            <p>
                List of customers
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('donhang.index')}}" class="nav-link">
            <i class="nav-icon fa fa-shopping-basket"></i>
            <p>
                Orders list

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('feedback.index')}}" class="nav-link">
            <i class="nav-icon fa fa-comments"></i>
            <p>
             Feedback Users
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('roles.index')}}" class="nav-link">
            <i class="nav-icon fa fa-newspaper"></i>
            <p>
            Roles
            </p>
          </a>
        </li>

         <li class="nav-item">
          <a href="{{route('permission.create')}}" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Permission
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
