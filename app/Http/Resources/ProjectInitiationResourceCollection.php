<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectInitiationResourceCollection extends ResourceCollection
{
    // public $preserveKeys = true;
    public static $wrap = 'project_init';

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
