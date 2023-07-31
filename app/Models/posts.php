<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $fillable = ['content','user_id','save','image','broker_save'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }


}
