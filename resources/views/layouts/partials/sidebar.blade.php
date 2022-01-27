<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="image/user.png" alt="A" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block"></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{route('admin.category.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{route('admin.tag.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{route('admin.post.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                @hasrole('Admin')
                    <li class="nav-item mt-auto">
                        <a href="{{route('admin.user.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a href="{{route('admin.role.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Role
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a href="{{route('admin.permission.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Permission
                            </p>
                        </a>
                    </li>
                @endhasrole
                <li class="nav-item mt-auto">
                    <a href="{{route('admin.profile.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
