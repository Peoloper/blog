<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $role = Role::create(['name' => 'writer']);
       // $permisson = Permission::create(['name' => 'edit post']);
       // $role = Role::findById(1);
        //$permisson = Permission::findById(1);
       // $role->givePermissionTo($permisson);

       // auth()->user()->givePermissionTo('edit post');
        //auth()->user()->assignRole('writer');
       // dump(auth()->user()->permissions());
        return view('home');
    }
}
