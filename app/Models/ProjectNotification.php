<?php

namespace App\Models;

use App\Models\ProjectSubmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectNotification extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function submitted_project()
    {
        return $this->belongsTo(ProjectSubmission::class);
    }
}
