<?php

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
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {


    if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        abort(404);
        // return redirect('/');
    }

    // caching the post for 5 seconds
    $post = cache()->remember("posts.{$slug}", 5, fn () => file_get_contents($path)); //using arrow function
    // // using normal function
    //  function () use ($path) { var_dump('file_get_contents'); return  file_get_contents($path);}); // end using normal function

    return view('post', ['post' => $post]);
})->where('post', '[A-z_-]+'); // 'post' is the name of the wildcard and the second one is the regular expression (ROUTE WILDCARD CONSTRAINTS)
    // ->whereAlpha('post');
    // ->whereAlphaNumeric('post');
    // ->whereNumber('post');
