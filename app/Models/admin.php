<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;
    protected $casts = [
        'password' => 'hashed',
    ];
    // protected $hidden = [
    //     '_token',
    // ];
    protected $fillable=["name","email","password","gender","prive","permission"];

    public function setPermissionAttribute($permission){
        $this->attributes ["permission"] = implode("+",$permission);
    }

    public function getPermissionAttribute($permission){
        return explode("+",$permission);
    }

    public static function updatedAdmin($request,$id){
     $data=$request->except("_token","_method");
     $permission=implode("+",$request->permission);
     $data["permission"]=$permission;
     admin::where("id",$id)->update($data);
    }
}
