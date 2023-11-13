<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectInitiation;
use App\Models\ProjectCategory;
use App\Http\Resources\ProjectInitiationResource;
use App\Http\Resources\ProjectCategoryResourceCollection;
use App\Http\Resources\ProjectInitiationResourceCollection;
use Illuminate\Http\Request;

class ProjectInitiationAPIController extends Controller
{
    public function project_initiation (Request $request) {

        $init = ProjectInitiation::get();
        // $init = $init->keyBy->id;
        
        // return ProjectInitiationResource::collection($init);
        return new ProjectInitiationResourceCollection($init);

    }

    public function project_category (Request $request) {

        $category = ProjectCategory::get();
        $category = $category->keyBy->id;
        
        return new ProjectCategoryResourceCollection($category);

    }
}
