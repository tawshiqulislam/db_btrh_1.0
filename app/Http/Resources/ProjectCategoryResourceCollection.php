<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCategoryResourceCollection extends ResourceCollection
{
    // public $preserveKeys = true;
    public static $wrap = 'project_category';

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
