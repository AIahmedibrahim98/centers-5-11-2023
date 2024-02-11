<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function main_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
