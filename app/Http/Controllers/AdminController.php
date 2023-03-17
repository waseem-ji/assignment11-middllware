<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function viewPostPanel()
    {
        $posts_count = Post::count();
        // $posts = Post::paginate(5);
        $posts = Post::with(['pictures','user'])->paginate(5);
        $users_count = User::count();

        // return view('admin.panel', compact('posts', 'posts_count', 'users_count', 'users'));
        return view('admin.postPanel', compact('posts', 'posts_count', 'users_count'));
    }
    public function viewUserPanel()
    {
        $posts_count = Post::count();

        // might be able to reduce db call!!
        $users_count = User::count();
        // $users= User::paginate(6);
        $users= User::with('posts')->paginate(6);



        // return view('admin.panel', compact('posts', 'posts_count', 'users_count', 'users'));
        return view('admin.UserPanel', compact('posts_count', 'users_count', 'users'));
    }

    public function editUser(User $user)
    {
        return view('admin.editUser', compact('user'));
    }


    public function updateUser(User $user)
    {
        $attributes = request()->validate([
            'dob' => ['required','date'],
            'phone' => ['required','digits:10', 'numeric'],
            'name' => ['required'],
            'gender' => ['required'],
            'email' => ['required','email',  Rule::unique('users')->ignore($user->id)],
        ]);



        if (request()->hasFile('profile_pic')) {
            $image = request()->file('profile_pic');

            request()->validate([
                'profile_pic' => 'image'
            ]);

            $filename = $image->store('public/images/profile');

            $attributes['profile_pic'] = substr($filename, 7);
            $user->update($attributes);
        } else {
            $user->update($attributes);
        }


        return back()->with('success', 'User Updated');
    }




    public function editPost(Post $post)
    {
        // dd($post);
        $pictures = Picture::where('post_id', $post->id)->get();
        return view('admin.editPost', compact('post', 'pictures'));
    }

    public function updatePost(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);
        $attributes['user_id'] = $post->user->id;

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
                // 'new_images' => 'image',
                'new_images.*' => 'mimes:jpg,png,jpeg'
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
        return back()->with('success', 'Post Updated');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted anmflks!!');
    }

    public function deletePostPicture(Post $post)
    {
        $pictures = Picture::where('post_id', $post->id)->get();



        foreach ($pictures as $picture) {
            // check if the user requested to delete this picture
            if (request()->has('delete_picture_' . $picture->id)) {
                Storage::delete($picture->url);
                $picture->delete();
            }
        }
        return back()->with('success', 'Photo deleted ');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'User Deleted Succesfully');
    }
}
