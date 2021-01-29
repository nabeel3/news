<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
     public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
      public function tags()
    {
        return $this->hasMany(Tag::class,'id','tag_id');
    }


}
