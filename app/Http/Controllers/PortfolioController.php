<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Portfolio::all();
        return view('portfolios.index', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolios.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPorto = new Portfolio;
        $newPorto['file_url'] = $request['file_url'];
        $newPorto['title'] = $request['title'];
        $newPorto['description'] = $request['description'];

        $newPorto->save();
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
        $temp = Portfolio::find($id);

        return view('portfolios.formcreate',['temp' => $temp]);
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
        return redirect()->route('admin_home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');
        Portfolio::destroy($id);
        return redirect()->route('admin_home');
    }
}
