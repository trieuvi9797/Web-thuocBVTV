<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Permisson extends Permisson
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];
}
