<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reviewable()
    {
        return $this->morphTo();
    }
    public function replys()
    {
        return $this->morphMany(Reply::class,'replyable')->orderBy('id','desc');
    }
}
