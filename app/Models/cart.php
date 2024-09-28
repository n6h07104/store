<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","product_id","count"];

    public function products(){
        return $this->hasMany(product::class,"id","product_id");
    }
}
