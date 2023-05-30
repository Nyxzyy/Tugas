<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddPortofolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Portfolio::all();

        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPortofolioRequest $request)
    {
        $newPorto = new Portfolio;
        $newPorto['file_url'] = $request['file_url'];
        $newPorto['title'] = $request['title'];
        $newPorto['description'] = $request['description'];

        $newPorto->save();
        return response('Create Success');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->route('id');
        $portofolio = Portfolio::find($id);
        $portofolio['file_url'] = $request['file_url'];
        $portofolio['title'] = $request['title'];
        $portofolio['description'] = $request['description'];

        $portofolio->save();
        return response('Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddPortofolioRequest $request)
    {
        $id = $request->route('id');
        Portfolio::destroy($id);
        return response('Delete Successful');
    }
}
