<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable= ['chattext', 'forum_id', 'userid_chat'];
}
