<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Task;
use App\Models\Status;
use App\Models\ProjectInitiation;
use App\Models\ProjectCategory;

use App\Http\Resources\UserInfoResource;
use App\Http\Resources\UserDetailResource;
use App\Http\Resources\VendorResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\ProjectInitiationResource;

use App\Http\Resources\ProjectInitiationResourceCollection;
use App\Http\Resources\ProjectCategoryResourceCollection;
use Illuminate\Http\Request;

class ProjectInitiationAPIController extends Controller
{
    public function user_info (Request $request) {

        $user = User::get();
        
        return UserInfoResource::collection($user);
    }

    public function user_detail (Request $request) {

        $user = UserDetail::get();
        
        return UserDetailResource::collection($user);
    }

    public function vendor (Request $request) {

        $vendor = User::get();
        
        return VendorResource::collection($vendor);
    }

    public function task (Request $request) {

        $task = Task::get();
        
        return TaskResource::collection($task);
    }

    public function project_initiation (Request $request) {

        $init = ProjectInitiation::get();
        // $init = $init->keyBy->id;
        
        return new ProjectInitiationResourceCollection($init);

    }

    public function project_category (Request $request) {

        $category = ProjectCategory::get();
        // $category = $category->keyBy->id;
        
        return new ProjectCategoryResourceCollection($category);

    }
}
