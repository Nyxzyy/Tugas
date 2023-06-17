<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddPortofolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function login(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),
            'token'   => $token
        ], 200);

    }

    public function logout(){
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
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
