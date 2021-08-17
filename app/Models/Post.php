<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
// extends Model
{
    // use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        // return File::files(resource_path("posts/")); //return the whole files inside the posts folder
        $files = File::files(resource_path("posts/"));

        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);

        return array_map(fn ($file) => $file->getContents(), $files); // same as above but this use arrow function
    }




    public static function find($slug)
    {
        // if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {

        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {  //same as above line but this time using resource path instead of __DIR__.
            abort(404);
            // throw new ModelNotFoundException();
        }
        // caching the post for 5 seconds
        return cache()->remember("posts.{$slug}", 5, fn () => file_get_contents($path)); //using arrow function

        // $post = cache()->remember("posts.{$slug}", 5, fn () => file_get_contents($path)); //using arrow function
        // // // using normal function
        // //  function () use ($path) { var_dump('file_get_contents'); return  file_get_contents($path);}); // end using normal function
        // return view('post', ['post' => $post]);
    }
}
