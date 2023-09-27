<?php

namespace App\Http\Controllers;
use App\Models\ReaderDetails;
use Illuminate\Http\Request;

class ReaderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req)
    {
        $email = $req->input('email');
        if($email){
            $password = ReaderDetails::where('email', $email)->value('password');

            return response()->json([
                'email' => $email,
                'password' => $password,

            ]);
        }else{
            return "not found";
        }











    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
