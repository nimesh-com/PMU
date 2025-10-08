<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BudgetCode;
use App\Models\Level01;
use App\Models\Level02;
use App\Models\Level03;
use App\Models\ActivityLog;
use App\Models\MonthlyData;
use App\Models\Allocation;
use App\Models\System;

class ActivityController extends Controller
{


    public function create()
    {
        $Level01s = Level01::all()->unique('name');
        $Level02s = Level02::all()->unique('name');
        $Level03s = Level03::all()->unique('name');
        $BudgetCodes = BudgetCode::all();
        $Systems = System::all();
        return view('activity.create', compact('BudgetCodes', 'Level01s', 'Level02s', 'Level03s', 'Systems'));
    }


    public function store(Request $request)
    {
        // 1. Validate the request data
        $validatedData = $request->validate([
            'budget_code' => 'required|string|max:50',
            'level1' => 'nullable|string|max:100',
            'level2' => 'nullable|string|max:100',
            'level3' => 'nullable|string|max:100',
            'division' => 'required|string|max:50',
            'year' => 'required|integer|min:2000|max:2100',
            'total_allocation' => 'required|numeric|min:0',
            'allocation' => 'required|numeric|min:0',
            'unit' => 'required|string|max:20',
        ]);

        $bcode = BudgetCode::where('code', $validatedData['budget_code'])->first();

        $Allocation = Allocation::create([
            'amount' => $validatedData['total_allocation'],
            'physical' => $validatedData['allocation'],
            'unit' => $validatedData['unit'],
        ]);
        $activityData = ActivityLog::create([
            'user_id' => Auth::user()->id,
            'name' => 'Test Activity',
            'budget_code_id' => $bcode->id,
            'allocation_id' => $Allocation->id,
            'description' => null
        ]);


        Level01::create([
            'name' => $validatedData['level1'],
            'activity_log_id' => $activityData->id,
            'description' => null,
        ]);

        Level02::create([
            'name' => $validatedData['level2'],
            'activity_log_id' => $activityData->id,
            'description' => null,
        ]);

        Level03::create([
            'name' => $validatedData['level3'],
            'activity_log_id' => $activityData->id,
            'description' => null,
        ]);

        // 4. Prepare months
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        // 5. Create MonthlyData only if finance or non-finance is present
        foreach ($months as $index => $month) {
            $finance = (float) ($request->input('financial_' . strtolower($month)) ?? 0);
            $nonFinance = (float) ($request->input('physical_' . strtolower($month)) ?? 0);

            if ($finance > 0 || $nonFinance > 0) {
                MonthlyData::create([
                    'activity_log_id' => $activityData->id,
                    'year' => $validatedData['year'],
                    'month'       => $month, // 1 = Jan
                    'financial'     => $finance,
                    'physical' => $nonFinance,
                ]);
            }
        }

        // 7. Create Allocation record


        // 8. Redirect back with success
        return redirect()->route('activity.create')->with('success', 'Activity and monthly data created successfully!');
    }

    public function report(){

        $Activitys = ActivityLog::with('level01', 'level02', 'level03')->get();
        return view('activity.report', compact('Activitys')); 
    }
}
