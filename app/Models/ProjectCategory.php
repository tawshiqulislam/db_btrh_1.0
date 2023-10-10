<?php

namespace App\Models;

use App\Models\ProjectInitiation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function project_initiations()
    {
        return $this->hasMany(ProjectInitiation::class);
    }
}