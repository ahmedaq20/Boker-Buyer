<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brokerinof extends Model
{
    use HasFactory;
    protected $fillable = ['fname','lname','bio','stars','country','city','birthday','user_id','interests','image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function broker()
    {
        return $this->belongsTo(broker::class);
    }

}

