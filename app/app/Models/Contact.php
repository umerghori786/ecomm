<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =['user_id','contact','email','location','facebook','x','skype','youtube','percentage'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
