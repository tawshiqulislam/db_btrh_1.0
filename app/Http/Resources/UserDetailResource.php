<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
{
    public static $wrap = 'user_detail';
    
    public function toArray(Request $request): array
    {
        return array_merge(
            parent::toArray($request),
            [
                'user' => $this->user()->select('id','username')->first()
            ]
        );
    }
}
