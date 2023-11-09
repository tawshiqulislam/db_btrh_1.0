<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Resource\ResourceManagement;

class ResourceManagementController extends Controller
{
    public function delete(ResourceManagement $resourceManagement)
    {
        $resourceManagement->delete();
        toastr()->error('Resource record deleted!', 'Delete');
        return redirect()->back();
    }
}
