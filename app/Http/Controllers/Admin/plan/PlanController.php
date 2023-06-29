<?php

namespace App\Http\Controllers\Admin\Plan;


use App\Models\Plan;
use App\Models\Policy;
use App\Models\System;
use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $plans = Plan::with(['policy'])
            ->where('team_id', $user->currentTeam->id) // Use team_id instead of tenant_id
            ->latest()
            ->paginate(8);

        return view('admin.plan.index', compact('plans'));
    }

    public function create()
    {
        $user = Auth::user();
        $policies = Policy::where('team_id', $user->currentTeam->id) // Use team_id instead of tenant_id
            ->latest()
            ->get();

        return view('admin.plan.create', compact('policies'));
    }

    public function store(PlanRequest $request)
    {
        $user = Auth::user();
        $plan = Plan::create([
            'name' => $request->name,
            'number_of_days' => $request->number_of_days,
            'duration_unit' => $request->duration_unit,
            'price' => $request->price,
            'policy_id' => $request->policy_id,
            'team_id' => $user->currentTeam->id, // Use team_id instead of tenant_id
        ]);

        return redirect()->route('admin.plan.index')->with('message', 'Buchung Period erfolgreich erstellt 🎉')->with('timeout', 3000);
    }

    public function edit(Plan $plan)
    {
        $user = Auth::user();
        $policies = Policy::where('team_id', $user->currentTeam->id) // Use team_id instead of tenant_id
            ->latest()
            ->get();

        return view('admin.plan.edit', compact('plan', 'policies'));
    }

    public function update(PlanRequest $request, Plan $plan)
    {
        $plan->update([
            'name' => $request->name,
            'number_of_days' => $request->number_of_days,
            'duration_unit' => $request->duration_unit,
            'price' => $request->price,
            'policy_id' => $request->policy_id,
        ]);

        return redirect()->route('admin.plan.index')->with('message', 'Buchung Period wurde erfolgreich aktualisiert 🎉')->with('timeout', 3000);;
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.plan.index')->with('message', 'Buchung Perioderfolgreich gelöscht')->with('timeout', 3000);;
    }
}
