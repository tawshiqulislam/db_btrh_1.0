<?php

namespace App\Http\Resources;

use App\Models\SecurityQuestion;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    public static $wrap = 'vendor';

    public function toArray(Request $request): array
    {
        return array_merge(
            parent::toArray($request),
            [
                'Document' => $this->documents,
                'Role' => Role::get(),
                'SecurityQuestion' => SecurityQuestion::get(),
            ]
        );
    }
}
