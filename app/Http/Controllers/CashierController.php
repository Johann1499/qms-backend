<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        return response()->json(Cashier::all());
    }
    
    public function getInactiveCashiers()
    {
        // Fetch inactive cashiers
        $inactiveCashiers = Cashier::where('status', 0)->get();

        // Return the cashiers as JSON
        return response()->json($inactiveCashiers);
    }

    public function getStatus($id)
    {
    $cashier = Cashier::findOrFail($id);
    return response()->json(['status' => $cashier->status]);
    }

    

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'status' => 'required|boolean',
    ]);

    $cashier = new Cashier();
    $cashier->name = $request->name;
    $cashier->department = $request->department;
    $cashier->status = $request->status;
    $cashier->save();

    return response()->json(['message' => 'Cashier added successfully'], 201);
    }


    public function update(Request $request, $id)
    {
        $cashier = Cashier::findOrFail($id);
        $cashier->name = $request->input('name');
        $cashier->department = $request->input('department');
        $cashier->save();

        return response()->json(['message' => 'Cashier updated successfully'], 200);
    }

    public function destroy($id)
    {
        $cashier = Cashier::find($id);
        if ($cashier) {
            $cashier->delete();
            return response()->json(['message' => 'Cashier deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Cashier not found'], 404);
        }
    }

    // In CashierController.php



    public function updateStatus(Request $request, $id)
    {
        // Find the cashier by ID
        $cashier = Cashier::find($id);

        // Check if cashier exists
        if (!$cashier) {
            return response()->json(['message' => 'Cashier not found'], 404);
        }

        // Validate the status input
        $request->validate([
            'status' => 'required|boolean'
        ]);

        // Update the status
        $cashier->status = $request->input('status') ? 1 : 0;
        $cashier->save();

        // Return a success response
        return response()->json(['message' => 'Cashier status updated successfully']);
    }



}
