<?php

namespace App\Http\Controllers\dashboard\product;

use Throwable;
use App\Models\Image;
use App\Models\product;
use App\trait\updateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use updateProduct;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check=Gate::forUser(Auth::guard("admin")->user())->allows("view.product");
            if($check){
                $data=product::with("images")->get();
                return view("dashboard.product.view",compact("data"));
            }else{
                return abort(403);
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $check=Gate::forUser(Auth::guard("admin")->user())->allows("add.product");
            if($check){
        return view("dashboard.product.add");
        }else{
        return abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

    DB::beginTransaction();
    try{
        $product=product::create($request->except("file"));
        $product_id=$product->id;
        Image::createImage($product_id,$request->only("file"));
        DB::commit();
        return redirect()->route("product.index")->with("ms-admin","success add product");
    }catch(Throwable $e){
              DB::rollBack();
              return redirect()->back()->with("ms-admin","ERROR");
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data=product::where("id",$id)->with("images")->get()[0];
        return view("dashboard.product.update",compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

     $this->updatePro($request,$id);
        return redirect()->route("product.index")->with("ms-admin","success update product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        product::where("id",$id)->delete();
        image::deleteImage($id);
        return redirect()->route("product.index")->with("ms-admin","success Delete product");

    }
}
