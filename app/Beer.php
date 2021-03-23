<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = ['name', 'color', 'alcohol', 'price', 'cover', 'description', 'content'];
}
