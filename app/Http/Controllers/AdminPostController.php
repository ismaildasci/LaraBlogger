<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    /** @test */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        // $attributes = $this->validatePost();

        // $attributes['user_id'] = auth()->id();

        // $attributes['thumbnail'] = request()
        //     ->file('thumbnail')
        //     ->store('thumbnails', 'public');

        Post::create(
            array_merge($this->validatePost(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()
                    ->file('thumbnail')
                    ->store('thumbnails'),
            ]),
        );

        return redirect('/')->with('success', 'Success Message');
    }

    /** @test */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /** @test */
    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()
                ->file('thumbnail')
                ->store('thumbnails', 'public');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
