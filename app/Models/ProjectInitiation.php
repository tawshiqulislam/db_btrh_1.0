<?php

namespace App\Models;

use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInitiation extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
