@extends('layouts.backend')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item"><a href="">Rola</a></li>
                        <li class="breadcrumb-item active">Edytuj rolę</li>
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
                                <h3 class="card-title">Edytuj rolę - {{$role->name}} </h3>
                                <a href="" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('admin.role.update', ['role' => $role])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Role name</label>
                                                <input type="name" name="name" class="form-control" value="{{$role->name}}" placeholder="Podaj nazwę">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5><b>Przypisz uprawnienia</b></h5>
                                            <div class="form-group">
                                                @foreach($permissions as $permission)
                                                    <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                        <input class="custom-control-input" name="permissions[]" type="checkbox" id="permission{{ $permission->id}}" value="{{ $permission->id }}"
                                                               @foreach($role->permissions as $permissionChecked)
                                                                    @if ($permission->id == $permissionChecked->id)
                                                                        checked
                                                                    @endif
                                                                @endforeach
                                                        >
                                                        <label for="permission{{ $permission->id}}" class="custom-control-label">{{ $permission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-lg btn-primary">Aktualizuj</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
