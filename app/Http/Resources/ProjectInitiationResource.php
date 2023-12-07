<?php

namespace App\Http\Resources;

use App\Http\Resources\ProjectCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectInitiationResource extends JsonResource
{

    public function toArray(Request $request)
    {
        $data = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'project_category_id' => $this->project_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'isVerified' => $this->isVerified,
            'status' => $this->status,
            // 'category' => new ProjectCategoryResource($this->project_category),
            'category' => $this->project_category()->select('id as category_id', 'name as category_name')->first(),
        ];

        return $data;
    }
}
