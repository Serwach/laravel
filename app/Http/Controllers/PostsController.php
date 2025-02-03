<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image'   => 'required'
        ]);

        $manager = new ImageManager(new Driver());
        $imgPath = request('image')->store('uploads', 'public');
        $image   = $manager
            ->read(public_path("storage/{$imgPath}"))
            ->crop(1000, 1000);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image'   => $imgPath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post): View|Factory|Application
    {
        return view('posts.show', compact('post'));
    }
}
