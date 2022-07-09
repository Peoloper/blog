@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item"><a href="">Użytkownik</a></li>
                        <li class="breadcrumb-item active">Edytuj użytkownika</li>
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
                                <h3 class="card-title">Edytuj użytkownika - {{ $user->name }}</h3>
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
                                    <form action="{{ route('admin.user.update', ['user' => $user])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">User name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Podaj nazwę" value="{{ $user->name }} ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Podaj email" value="{{ $user->email }} ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Hasło </label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Podaj hasło">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Rola</label>
                                                <select name="role" id="role" class="form-control">
                                                    @foreach($user->roles as $user_role)
                                                        <option value="{{$user_role->id}}" style="display: none" selected>{{$user_role->name}}</option>
                                                    @endforeach
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary float-right">Aktualizuj</button>
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

