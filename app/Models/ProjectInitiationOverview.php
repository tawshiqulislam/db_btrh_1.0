<?php

namespace App\Models;

use App\Models\ProjectInitiation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInitiationOverview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
