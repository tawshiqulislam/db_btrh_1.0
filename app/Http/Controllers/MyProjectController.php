<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\ProjectInitiation;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ProjectInitiationOverview;

class MyProjectController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $my_projects = ProjectInitiationOverview::where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //wheich projects are verified and unverified
        // $total_verified_project_initiations = ProjectInitiation::where('isVerified', true)->get()->count();
        // $total_unverified_project_initiations = ProjectInitiation::where('isVerified', false)->get()->count();
        // $total_active_project_initiations = ProjectInitiation::where('status', 'active')->get()->count();
        // $total_inactive_project_initiations = ProjectInitiation::where('status', 'inactive')->get()->count();
        // dd($unverified_project_initiations->count());
        //return index page
        return view(
            'backend.pages.my_project.my_project_index',
            [
                'my_projects' => $my_projects,
                'sl' => $sl,
                // 'total_verified_project_initiations' => $total_verified_project_initiations,
                // 'total_unverified_project_initiations' => $total_unverified_project_initiations,
                // 'total_active_project_initiations' => $total_active_project_initiations,
                // 'total_inactive_project_initiations' => $total_inactive_project_initiations
            ]
        );
    }







    public function info($id)
    {
        //find the current data
        $project_initiation = ProjectInitiation::find($id);
        $designations = Designation::all();
        $statuses = Status::all();
        $users = User::where('user_type', 'user')->where('isVerified', 1)->get();
        $vendors = User::where('user_type', 'vendor')->get();
        $tasks = Task::where('project_initiation_id', $id)->get();
        $roles = Role::all();
        $project_initiation_overviews = ProjectInitiationOverview::where('project_initiation_id', $id)->get();
        $permissions = Permission::all();
        return view(
            'backend.pages.my_project.my_project_info',
            compact(
                'project_initiation',
                'tasks',
                'statuses',
                'users',
                'project_initiation_overviews',
                'vendors',
                'designations',
                'permissions',
                'roles'
            )
        );
    }
}
