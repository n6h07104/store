<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Requests\adminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=admin::all("id","name","email","gender","prive");
        return view('dashboard.admin.view',compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.admin.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adminRequest $request)
    {
       admin::create($request->toArray());
       return redirect()->route("admin.index")->with("ms-admin","success add user");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=admin::findOrfail($id);
        return view("dashboard.admin.update",compact("data"));
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
        admin::updatedAdmin($request,$id);
        return redirect()->route("admin.index")->with("ms-admin","success update admin");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       admin::findOrfail($id)->delete();
       return redirect()->route("admin.index")->with("ms-admin","success delete admin");

    }
}
