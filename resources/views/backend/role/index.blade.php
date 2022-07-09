@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Role</h3>
                                <a href="{{route('admin.role.create')}}" class="btn btn-primary">Dodaj role</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Rola</th>
                                    <th>Uprawnienia</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span class="badge badge-primary">{{$permission->name}}</span>
                                            @endforeach
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{route('admin.role.edit', ['role' => $role])}}"class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{route('admin.role.destroy', ['role' => $role])}}"  id="deleteRole" class="mr-1" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">  <i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $(document).on("click", "#deleteRole", function (e) {
                var form =  $(this).closest("form");
                e.preventDefault();
                Swal.fire({
                    title: 'Jesteś pewny?',
                    text: "Nie będziesz w stanie tego cofnąć!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Tak, usuń!',
                    cancelButtonText: 'Anuluj'
                }).then((result) => {
                    if (result.value)
                    {
                        form.submit();
                    }
                })
            });
        })
    </script>
@endsection
