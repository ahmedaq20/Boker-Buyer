<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['content','post_id','status','broker_id'];

    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id');
    }
    public function brokers()
    {
        return $this->belongsTo(broker::class, 'post_id');
    }
}
