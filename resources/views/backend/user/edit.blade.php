@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Tags list</a></li>
                        <li class="breadcrumb-item active">Edit Tag</li>
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
                                <h3 class="card-title">Edit User - {{ $user->name }}</h3>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Go Back to User List</a>
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
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $user->name }} ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">User email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }} ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">User password <small>(Enter password if you want change.)</small></label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Roles</label>
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
                                            <button type="submit" class="btn btn-lg btn-primary">Update User</button>
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

