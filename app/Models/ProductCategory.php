<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    
    public function allChildren(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductCategory::class, 'parent_id')->with('allChildren');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function setNameAttribute($value)
    {   
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
