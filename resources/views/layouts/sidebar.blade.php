<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Germany</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                @if (isset(Auth::user()->avatar))
                <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div> --}}
            {{-- <div class="info">
                @if (isset(Auth::user()->name))
                  <a href="
                    {{Route('user.detail', ['id' => Auth::user()->id])}}
                  " class="d-block">{{Auth::user()->name}}</a>
                  <a href="{{Route('user.edit', ['id' => Auth::user()->id])}}" class="d-block">Cập nhật thông tin tài khoản</a>
                  <a href="{{route('logout')}}" class="d-block">Đăng xuất</a>
                @else
                  <a href="{{route('login')}}" class="d-block">Đăng nhập</a>
                  <a href="{{route('register')}}" class="d-block">Đăng ký</a>
                @endif
              </div>
            </div> --}}
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">

                        <p>
                            Post Controller
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/post/" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="post/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
