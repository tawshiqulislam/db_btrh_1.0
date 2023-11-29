<?php

namespace App\Http\Resources;

use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public static $wrap = 'task';
    
    public function toArray(Request $request): array
    {
        return array_merge(
            parent::toArray($request),
            [
                'assigned_by_user' => $this->assigned_by_user()->get(),
                'project_init' => $this->project_initiation()->get(),
                'status' => Status::get()
            ]
        );
    }
}
