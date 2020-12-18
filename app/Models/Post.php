<?php

namespace App\Models;

use App\Mail\PostStore;
use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable=['name','description'];
    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    // protected static function booted()
    // {
    //     static::created(function ($post) {
    //          Mail::to('coco@gmail.com')->send(new PostStore( $post ));
    //     });
    // }
}
