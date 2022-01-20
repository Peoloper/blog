<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/adminlte.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021  <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->


<form id="logout-form" action="" method="POST" style="display: none;">
    @csrf
</form>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


@include('sweetalert::alert')
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script>
    $(function () {
        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //delete action
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            let link = $(this).attr("href");
            let table = $(this).data('table');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: link,
                        type: 'DELETE',
                        data: {
                            _method: "DELETE"
                        },
                        success: function (data) {
                            console.log(data);
                            setTimeout(function () {
                                $(this).parents("tr").remove();
                                $('#' + table).DataTable().ajax.reload();
                                return false;
                            }, 500);

                        }
                    })
                }
            })
        });
    })
</script>
</body>
</html>
