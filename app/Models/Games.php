<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'content', 'created_at', 'updated_at'];

}
