<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
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
    public function store(Request $req)
    {
        $validateData = $req->validate([
            'Account_number' => 'required',
            'date' => 'required',
            'value' => 'required',
            'name' => 'required',

        ]);

        $customer = new Customer;

        $customer->Account_number = $validateData['Account_number'];
        $customer->name = $validateData['name'];
        $customer->date = $validateData['date'];
        $customer->value = $validateData['value'];

        $customer->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req)
    {
        $Account_number = $req->input('Account_number') ;

        $latestCustomer = Customer::where('Account_number', $Account_number)
            ->orderBy('date', 'desc')
            ->first();

        if ($latestCustomer) {
            $latestValue = $latestCustomer->value;

            if ($latestValue <= 30) {

                $fix = 500;
                $total = $latestValue * 20 + $fix;
                $first = $total;
                $second = 0;
                $third = 0;

            } elseif ($latestValue > 30 && $latestValue <= 60) {

                $fix = 1000;
                $unit = $latestValue - 30;
                $total = $unit * 35 + $fix + 600;

                $first = 20 * 30;
                $second = $total;
                $third = 0;

            } elseif ($latestValue > 60) {

                $fix = 1200;
                $default = 1650;
                $totalUnit = 0;

                $count = $latestValue - 60;
                $one_Unit_cost = 40;

                for ($i = 0; $i < $count; $i++) {

                    $totalUnit += $one_Unit_cost;

                    $one_Unit_cost++;

                }

                $total = $totalUnit + $fix + $default;
                $first = 20 * 30;
                $second = 35 * 30;
                $third = $total;

            }

            return response()->json([
                'latest_customer' => $latestCustomer,
                'latest_value' => $latestValue,
                'first' => $first,
                'second' => $second,
                'third' => $third,
                'fixed_charge_amount' => $fix,
                'total' => $total,

            ]);

        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
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
