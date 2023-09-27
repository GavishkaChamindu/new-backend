<?php

namespace App\Http\Controllers;
use App\Models\CustomerDetails;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginCheck(Request $req)
    {

        $Account_number = $req->input('Account_number');

        $checkReader = CustomerDetails::where('Account_number', $Account_number)->first();

        if ($checkReader) {

            $checkName = $checkReader->name;

           return response()->json([
                'checkNumber' => $Account_number,
                'checkName' => $checkName,

            ]);




        }

        return 'not found';

    }
}
