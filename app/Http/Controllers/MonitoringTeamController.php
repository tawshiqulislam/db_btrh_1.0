<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MonitoringTeam;
use App\Models\ProjectInitiation;
use Illuminate\Support\Facades\DB;

class MonitoringTeamController extends Controller
{
    public function index()
    {
        $monitoring_teams = MonitoringTeam::paginate(10);




        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.monitoring_team.monitoring_team_index', compact('sl', 'monitoring_teams'));
    }

    public function create()
    {
        $project_initiations = ProjectInitiation::all();
        $users = User::where('user_type', 'user')->get();

        return view('backend.pages.monitoring_team.monitoring_team_create', compact('project_initiations', 'users'));
    }

    public function store(Request $request)
    {
        try {

            MonitoringTeam::create($request->all());


            toastr()->success('Monitoring Team created successfully!', 'Congrats');

            return redirect()->route('monitoring_team.index');
        } catch (\Exception $e) {
            toastr()->error('An error occurred while creating the Monitoring Team.', 'Error');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $monitoring_team =  MonitoringTeam::where('id', $id)->first();
        $monitoring_team->delete();
        toastr()->error('Monitoring Team deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $monitoring_team = MonitoringTeam::find($id);
        $project_initiations = ProjectInitiation::all();
        $users = User::where('user_type', 'user')->get();
        return view('backend.pages.monitoring_team.monitoring_team_edit', compact('monitoring_team', 'project_initiations', 'users'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->except('_token');
        MonitoringTeam::where('id', $id)->update($data);
        toastr()->success('Monitoring Team updated successfully!', 'Congrats');
        return redirect()->route('monitoring_team.index');
    }
}
