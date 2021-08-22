<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected  $guarded = [];

    protected $with = ['category', 'author']; // to add category and author data for every request of Post #if we dont want this category and author for specfic request we can call the Post data without them by using "without(['author', 'cetegory'])"  

    // protected  $fillable = ['title', 'excerpt', 'body'];

    // search by slug , another option to search in slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return  $this->belongsTo(Category::class);
    }

    // public function user()  ////foriegn_key will be 'user_id'
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function author()  ////foriegn_key will be 'author_id'
    {
        return $this->belongsTo(User::class, 'user_id'); // second argument will override foriegn_key i.e author_id will be user_id
    }
}
