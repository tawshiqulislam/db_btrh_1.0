<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDocument extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }

    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
