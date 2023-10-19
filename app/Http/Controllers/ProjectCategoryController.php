<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCategoryStoreRequest;
use App\Http\Requests\ProjectCategoryUpdateRequest;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        //pagination
        $project_categorys = ProjectCategory::paginate(10);
        //main serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //return view page
        return view('backend.pages.project_category.project_category_index', compact('project_categorys', 'sl'));
    }

    public function create()
    {
        //return view page
        return view('backend.pages.project_category.project_category_create');
    }

    public function store(ProjectCategoryStoreRequest $request)
    {


        //insert data
        ProjectCategory::create($request->all());
        //success message
        toastr()->success('Project category created successfully!', 'Congrats');
        //return to a route
        return redirect()->route('project_category.index');
    }

    public function delete($id)
    {
        //find the data
        $project_category =  ProjectCategory::where('id', $id)->first();
        //delete the data
        $project_category->delete();
        //delete message
        toastr()->error('Project category deleted!', 'Delete');
        //return to the same route
        return redirect()->back();
    }

    public function edit($id)
    {
        //find the data
        $project_category = ProjectCategory::find($id);
        //return view page
        return view('backend.pages.project_category.project_category_edit', compact('project_category'));
    }
    public function update(ProjectCategoryUpdateRequest $request, $id)
    {

        //except the _token
        $data = $request->except('_token');
        //find the data and update
        ProjectCategory::where('id', $id)->update($data);
        //success message
        toastr()->success('Project category updated successfully!', 'Congrats');
        //return to a route
        return redirect()->route('project_category.index');
    }
    public function info($id)
    {
        //find the data
        $project_category = ProjectCategory::find($id);
        //return to a veiw page
        return view('backend.pages.project_category.project_category_info', compact('project_category'));
    }
}
