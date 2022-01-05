<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mvdnbrk\EloquentExpirable\Expirable;

class Link extends Model
{
    use HasFactory;
    use Expirable;

    protected $guarded = [];
    
}
