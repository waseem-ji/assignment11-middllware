<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id);

        if (request('search')) {
            $posts->where('body', 'like', '%#'.request('search').'%');
        }

        return view('feed.feed', [
            'posts' => $posts->latest()->get()
            // 'posts' => $posts->with('picutes')->latest

        ]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'body' => ['required'],
            // 'images.*' => [ 'max:5']
        ]);




        $attributes['user_id'] = auth()->id();
        $post= Post::create($attributes);

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            request()->validate([
                // 'images' => 'image',
                'images.*' => 'mimes:jpg,png,jpeg'
            ]);

            foreach ($images as $image) {
                $filename = $image->store('public/images');
                $post->pictures()->create([
                    'url' => substr($filename, 7),
                    'post_id' => $post->id,
                ]);
            }
        }
        $post->save();

        return redirect('/feed')->with('success', 'New Post created');
    }

    public function edit(Post $post)
    {
        // make sure user cant edit other people post


        if ($post->user_id !== auth()->user()->id) {
            abort(403);
        }


        $pictures = Picture::where('post_id', $post->id)->get();

        return view('feed.edit', compact('post', 'pictures'));
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);
        $attributes['user_id'] = auth()->id();

        $pictures = Picture::where('post_id', $post->id)->get();

        $existingPictures =[];


        foreach ($pictures as $picture) {
            $existingPictures[] = $picture;
        }


        // add new image
        $newPictures = [];
        if (request()->hasFile('new_images')) {
            $images = request()->file('new_images');

            request()->validate([
                // 'images' => 'image',
                'images.*' => 'mimes:jpg,png,jpeg'
            ]);

            foreach ($images as $image) {
                $filename = $image->store('public/images');
                $post->pictures()->create([
                    'url' => substr($filename, 7),
                    'post_id' => $post->id,
                ]);
            }
        }
        $allPictures = array_merge($existingPictures, $newPictures);
        $post->pictures()->saveMany($allPictures);





        $post->update($attributes);
        return redirect('feed')->with('success', 'Post Successfully Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'post Deleted');
    }

    public function deletePicture(Post $post)
    {
        $pictures = Picture::where('post_id', $post->id)->get();



        foreach ($pictures as $picture) {
            // check if the user requested to delete this picture
            if (request()->has('delete_picture_' . $picture->id)) {
                Storage::delete($picture->url);
                $picture->delete();
            }
        }
        return back()->with('success', 'Photo Deleted');
    }
}
