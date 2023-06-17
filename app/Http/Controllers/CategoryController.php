<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('categories.index', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCategories = new Category;
        $newCategories['name'] = $request['name'];
        $newCategories['id'] = $request['id'];
        $newCategories->save();
        return redirect()->route('admin_home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->route('id');
        $temp = Category::find($id);
        $category = Category::findOrFail($id);


        return view('categories.formcreate',['temp' => $temp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->route('id');
        $categories= Category::find($id);
        $categories['id'] = $request['id'];
        $categories['name'] = $request['name'];
        $categories->save();
        return redirect()->route('admin_home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');
        Category::destroy($id);
        return redirect()->route('admin_home');
    }
}
