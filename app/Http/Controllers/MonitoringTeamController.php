<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProjectInitiation;

class MonitoringTeamController extends Controller
{
    public function index()
    {
        $monitoring_teams = monitoring_team::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.monitoring_team.monitoring_team_index', compact('monitoring_teams', 'sl'));
    }

    public function create()
    {
        $project_initiations = ProjectInitiation::all();
        $users = User::all();

        return view('backend.pages.monitoring_team.monitoring_team_create', compact('project_initiations', 'users'));
    }

    public function store(Request $request)
    {

        monitoring_team::create([
            'name' => strtolower($request->name),
        ]);
        toastr()->success('monitoring_team created successfully!', 'Congrats');
        return redirect()->route('monitoring_team.index');
    }

    public function delete($id)
    {
        $monitoring_team =  monitoring_team::where('id', $id)->first();
        $monitoring_team->delete();
        toastr()->error('monitoring_team deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $monitoring_team = monitoring_team::find($id);
        return view('backend.pages.monitoring_team.monitoring_team_edit', compact('monitoring_team'));
    }
    public function update(Updatemonitoring_teamRequest $request, $id)
    {

        $data = $request->except('_token');
        monitoring_team::where('id', $id)->update([
            'name' => strtolower($data['name']),
        ]);
        toastr()->success('monitoring_team updated successfully!', 'Congrats');
        return redirect()->route('monitoring_team.index');
    }
}
