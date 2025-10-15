<?php

namespace App\Models;
use App\Models\Category;
// use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategories extends Model
{
    use HasFactory;

    /**
     * Explicitly set table name to match the migration (typo retained intentionally).
     */
      protected $table = 'parent_categories';

    protected $fillable = ['name'];

     public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
