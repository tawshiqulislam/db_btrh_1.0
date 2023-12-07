<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCategoryResource extends JsonResource
{
    
    public function toArray(Request $request)
    {
        $data = [
            'project_category_id' => $this->id,
            'category_name' => $this->name,
            'category_description' => $this->description,
        ];
        return $data;
    }
}
