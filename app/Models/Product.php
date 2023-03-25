<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleImageTrait;

    protected $fillable = [
        'name',
        'description',
        'sale',
        'price',
        'quantity',
    ];
    public function details(){
        return $this->hasMany(ProductDetail::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function assignCategory($categoryIds)
    {
        return $this->categories()->sync($categoryIds);
    }
}
