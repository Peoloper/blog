<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Traits\PhotoTrait;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    use PhotoTrait;

    public function index()
    {
        return view('backend.profile.index' , [
            'user' => User::find(\Auth::id()),
            'posts' => Post::with('user')->where('user_id', \Auth::id())->count() ,
            'isPublished' => Post::with('user')->where('is_published', 1)->where('user_id', \Auth::id())->count()
            ]);
    }

    public function update(ProfileRequest $request, User $profile)
    {
        $this->authorize('update', $profile);

        $data = array_filter($request->validated());

        if(!empty($data['image']))
        {
            $this->deleteImage($profile, 'users');

            $filePath = $this->uploadImage($data['image'], 'users', 200,100);

            $profile->photos()->update(['path' => $filePath]);
        }

        $profile->update($data);

        toast('Your profile has been updated','success');
        return redirect()->route('admin.profile.index');
    }

}
