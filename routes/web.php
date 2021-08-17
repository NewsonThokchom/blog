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

    // $files = File::files(resource_path("posts/"));
    // $posts = [];

    // $posts = collect($files)->map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // });

    // find all the files in the post directory and collect them into a collection and loop over or map over each item and reach one, parse that file into the  $document once then we ve got the collection of document map over the second time and this time we gonna build up our own post object and pass it to view
    // $posts = collect($files = File::files(resource_path("posts/"))) //assign File:: files(resource_path...) in $files as inline
    //     ->map(
    //         fn ($file) => YamlFrontMatter::parseFile($file)
    //     )
    //     ->map(
    //         fn ($document) =>  new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         )
    //     );

    // same functional with above $posts= collect() codeblock
    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);

    // same functional with above $posts= collect() and $posts=array_map codeblock
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

    // return view('posts', [
    //     'posts' => $posts
    // ]);

    return view('posts', [
        'posts' => Post::all()
    ]);
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
