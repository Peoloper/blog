@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item"><a href="">Użytkownicy</a></li>
                        <li class="breadcrumb-item active">Zobacz użytkownika</li>
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
                                <h3 class="card-title">Zobacz użytkownika</h3>
                                <a href="{{route('admin.user.index')}}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-pimary">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px">Zdjęcie</th>
                                        <td>
                                            <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                                <img src="{{$user->photos->first()->path ?? null}}" class="img-fluid" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Nazwa</th>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Email</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Rola</th>
                                        <td>
                                            @foreach($user->roles as $user_role)
                                                <span>{{$user_role->name}}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Uprawnienia</th>
                                        <td>
                                             @foreach ($user->roles as $role)
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-primary">{{$permission->name}}</span>
                                                @endforeach
                                             @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
