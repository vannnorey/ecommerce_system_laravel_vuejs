<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'rating',
        'size',
        // 'inventory_id',
        'category_id',
        'brand_id',
        'quantity_in_stock',
        'image',
        'images',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    // public function inventories()
    // {
    //     return $this->hasMany(Inventory::class);
    // }


    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class);
    // }
    // public function inventory()
    // {
    //     return $this->hasMany(Inventory::class);
    // }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->approved();
    }

    public function getAverageRatingAttribute()
    {
        return $this->approvedReviews()->avg('rating') ?? 0;
    }

    public function getReviewsCountAttribute()
    {
        return $this->approvedReviews()->count();
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getWishlistCountAttribute()
    {
        return $this->wishlists()->count();
    }
}
