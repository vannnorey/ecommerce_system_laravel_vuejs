<?php

namespace App\Models;
use App\Models\ParentCategories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id'
    ];

    // Relationships
    public function parentCategory()
    {
        return $this->belongsTo(ParentCategories::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
