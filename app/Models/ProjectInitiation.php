<?php

namespace App\Models;

use App\Models\ProjectCategory;
use App\Models\ProjectDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    public function project_documents()
    {
        return $this->hasMany(ProjectDocument::class);
    }
}