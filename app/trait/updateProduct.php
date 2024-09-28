<?php

namespace App\trait;

use App\Models\Image;
use App\Models\product;

trait updateProduct{

    public  function updatePro($request,$id){
            if(empty($request->file)){
            product::where("id",$id)->update($request->except("file","_method","_token"));
            return redirect()->route("product.index")->with("ms-admin","success add product");
        }else{
            product::where("id",$id)->update($request->except("file","_method","_token"));
            Image::deleteImage($id);
            Image::where("product_id",$id)->delete();
            Image::createImage($id,$request->only("file"));
             return redirect()->route("product.index")->with("ms-admin","success add product");
        }

    }

}

