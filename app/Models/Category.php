<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // relasi one to many ke product
    public $fillable = ['name', 'slug'];
    public function product()
    {
        return $this->hasMany(product::class);
    }
}
