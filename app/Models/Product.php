<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'slug', 'description', 'price', 'stock', 'image', 'category_id'];

    // relasi product ke category
    public function category()
    {
        return $this->belongsToc(category::class);
    }

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function review()
    {
        return $this->hasMany(review::class);
    }

    // relasi many to many
    public function orders()
    {
        return $this->belongsToMany(order::class)->withPivot('qty', 'price')->withTimestamps();
    }
}
