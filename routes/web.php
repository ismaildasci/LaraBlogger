<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::test()
    ]);
});

Route::get('posts/{post}', function ($slug) {


    return view('post', [
        'post' => Post::find($slug)
    ]);

    //     if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
    //      abort(404);
    //         return redirect('/');
    //     }

    //    $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
    //        var_dump('file_get_contents');
    //        return file_get_contents($path);
    //    });
    //     $post = cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

    //     return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+');
