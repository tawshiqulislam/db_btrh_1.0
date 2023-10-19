<?php

namespace App\Models;

use App\Models\ProjectInitiation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function project_initiations()
    {
        return $this->hasMany(ProjectInitiation::class);
    }
    public function project_documents()
    {
        return $this->hasMany(ProjectDocument::class);
    }

    public function project_details()
    {
        return $this->hasMany(ProjectDetail::class);
    }
}
