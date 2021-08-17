<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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

    // // $posts = Post::all()[0]->getPathname();// getPathname() is used to get file path and [0] is the array index
    // $posts = Post::all()[0]->getContents(); // getContents() is used to get file contents
    // // $posts = Post::all()[0]->getContents(); // getContents() is used to get file contents
    // ddd(Post::all());

    // $document = YamlFrontMatter::parseFile(
    //     resource_path("posts/my-fourth-post.html")
    // );

    $files = File::files(resource_path("posts/"));
    // $posts = [];

    $posts = array_map(function ($file) {
        $document = YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }, $files);

    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }
    // ddd($posts[0]);

    return view('posts', [
        'posts' => $posts
    ]);

    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
});

Route::get('/posts/{post}', function ($slug) {
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_-]+'); // 'post' is the name of the wildcard and the second one is the regular expression (ROUTE WILDCARD CONSTRAINTS)
    // ->whereAlpha('post');
    // ->whereAlphaNumeric('post');
    // ->whereNumber('post');
