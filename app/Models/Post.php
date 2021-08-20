<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected  $guarded = [];
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
}
