<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfilesController extends Controller
{
    public function index(User $user): View|Factory|Application
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user): View|Factory|Application
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $imgPath = "";
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $manager = new ImageManager(new Driver());
            $imgPath = request('image')->store('profile', 'public');
            $image   = $manager
                ->read(public_path("storage/{$imgPath}"))
                ->crop(1000, 1000);
            $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imgPath]
        ));

        return redirect('/profile/{$user->id}');
    }
}
