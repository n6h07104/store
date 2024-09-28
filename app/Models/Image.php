<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        "product_id",
        "file",
    ];

    public function products(){
        return $this->belongsTo(product::class,"id","product_id");

    }


    
    public static function createImage($product_id,$files){
        foreach($files["file"] as $file){
            $new_name=md5(uniqid()).".".$file->extension();
            Image::create([
                "product_id"=>$product_id,
                "file"=>$new_name,
            ]);
            $file->storeAS("public/images/".$new_name);
        }

    }

    public static function deleteImage($id){
        $files=Image::where("id",$id)->get();
        foreach($files as $file){
            unlink(storage_path("app/public/images/".$file["file"]));
        }
    }
}


