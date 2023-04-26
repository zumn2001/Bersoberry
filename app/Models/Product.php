<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function productDescriptions(){
        return $this->hasMany(ProductDescription::class);
    }
    public function productimages(){
        return $this->hasMany(ProductImage::class);
    }
}
