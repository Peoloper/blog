<?php

namespace App\Http\Controllers\backend;

use App\DataTables\backend\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\NewPostNotification;
use App\Http\Traits\PhotoTrait;


class PostController extends Controller
{
    use PhotoTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('backend.post.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('backend.post.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $filePath = $this->uploadImage($data['image'], 'posts', 600, 300);
        $post = Post::create($data);
        $post->tags()->sync($data['tags']);
        $post->photos()->create(['path' => $filePath]);

        $admin = User::whereHas('roles', function ($query) {
            $query->where('id', 3);
        })->get();

       \Notification::send($admin, new NewPostNotification($post));

        toast('Post został dodany','success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('backend.post.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        if(!empty($data['image']))
        {
            $this->deleteImage($post,'posts');

            $filePath = $this->uploadImage($data['image'], 'posts', 600, 300);

            $post->photos()->update(['path' => $filePath]);
        }

        $post->update($data);
        $post->tags()->sync($data['tags']);

        toast('Post został zaaktualizowany','success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $this->deleteImage($post,'posts');
        $post->delete();
        $post->photos()->delete();
    }
}
