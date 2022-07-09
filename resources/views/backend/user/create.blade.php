@extends('layouts.backend')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Strona główna</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Użytkownicy</a></li>
                        <li class="breadcrumb-item active">Dodaj użytkownika</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Dodaj użytkownika</h3>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Powrót</a>
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
                                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Nazwa</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Podaj nazwę">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Podaj email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Hasło</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Podaj hasło">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Rola</label>
                                                <select name="role" id="role" class="form-control">
                                                    <option value="" style="display: none" selected>Wybierz rolę</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary float-right">Dodaj</button>
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
