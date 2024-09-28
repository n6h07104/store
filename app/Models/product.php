<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "price",
        "sale",
        "count",
        "category"
    ];

    public function images(){
        return $this->hasMany(Image::class,"product_id","id");
    }
}
