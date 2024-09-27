<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineTemperature;

class MachineTemperatureController extends Controller
{
    public function getTemperatures(Request $request)
    {
        try {
            $startDate = $request->query('start_date');
            $endDate = $request->query('end_date');

            $data = MachineTemperature::getTemperatures($startDate, $endDate);
            return response()->json($data);

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
